<div  class="geolocations index">
	<h2><?php __('Temperature Dashboard');?></h2>
	
	<div id="appCanvas" class="tabbable">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#1" data-toggle="tab">Current Location</a></li>
            <li><a href="#2" data-toggle="tab">Favorite Locations</a></li>
             <li><a href="#3" data-toggle="tab">Friends G-Warming Info</a></li>
              <li><a href="#4" data-toggle="tab">Take Action</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="1">
                <div class="span3">
                    <article>
                        <address>
                            <h1><?php echo $user_geolocation['Geolocation']['city']  ?> </h1>
                            <h2><?php echo $user_geolocation['Geolocation']['country_name']  ?></h2>
                        </address>
                        <figure>
                            <img src="<?php echo $user_geolocation['current_observation']['image']['url'] ?>"/>
                            <figcaption><?php echo $user_geolocation['current_observation']['weather']?></figcaption>
                        </figure>
                        <h2> <?php echo $user_geolocation['current_observation']['temp_f']?> Fahrenheit </h2>
                         <h2> <?php echo $user_geolocation['current_observation']['temp_c']?> Celsius </h2>
                        <small><?php echo $user_geolocation['current_observation']['observation_time']?></small>
                     </article>
                     <br/>
                     <br/>
                     <br/>
                     <section>
                          <?php 
                            if(!empty($multipleCityMatches) && count($multipleCityMatches) > 0)
                            {
                            ?>
                            <div id="possibleMatches" class="well">
                                <h3>Which city are you looking for:</h3>
                                <ul class="possibleMatchList">
                                    <?php  
                                    $count=0;
                                    foreach ($multipleCityMatches as $possibleMatch) 
                                    {
                                        $record_id = "possibleMatch_" . $possibleMatch['City']['city_name'] . "_" .$possibleMatch['Country']['iso3']  ;
                                    ?>
                                    <li>
                                      <p>  <?php echo $possibleMatch['City']['city_name'] ?>,
                                        <?php echo $possibleMatch['Country']['country'] ?>,
                                         <?php echo $possibleMatch['Country']['region'] ?></p>
                                        <button id="<?php echo $record_id ?>" class="possibleMatch btn btn-primary" href="#">Choose</button>
                                       <script>
                                            var possibleValues = 
                                            {
                                                city_name: "<?php echo $possibleMatch['City']['city_name'] ?>",
                                                country_code_tld: "<?php echo $possibleMatch['Country']['tld'] ?>",
                                                country_code_iso3: "<?php echo $possibleMatch['Country']['iso3'] ?>",
                                                country_name: "<?php echo $possibleMatch['Country']['country'] ?>",
                                                latitude: "<?php echo $possibleMatch['City']['latitude'] ?>",
                                                longitude: "<?php echo $possibleMatch['City']['longitude'] ?>"
                                            }
                                            $("#possibleMatches").data("<?php echo $record_id ?>", possibleValues);
                                       </script>
                                       
                                    </li>
                                    
                                    
                                    <?php    
                                    } 
                                    ?>
                                </ul>    
                            </div>    
                            <?php
                            }
                            ?>
                     <?php echo $this->Form->create('Geolocation');
                            $options = array(
                            'div' => null,
                            'class' => 'btn .btn-large', 
                            'id' => 'submitLocationButton',  
                            'label' => __('Change My City', true),
                            );
                            ?>
                            
                            <h2>Update your city</h2>
                           
                            <h3>City AutoComplete Search</h3>
                           <p class=""><strong>Use the  text box below. As you begin typing, a suggestion box with city entries will pop up that you 
                               must select from to be able to validate your change of location</strong> </p>
                          
                           <?php
                           echo  $form->input('location', array('div'=>null, 'class'=>'input-xlarge', "placeholder"=>__("Start typing a city or country name",true)));
                           ?>
                            <p class="help-block"><strong>Note:</strong> There might be a slight delay in between the time you start typing and the moment the suggestion box appears while the data is being retrieved
                             from the location API depending on your connection. </p>
                            <h3> OR </h2>
                             <h3> Choose By Country then City</h3>
                           <?php
                           
                           
                           echo  $form->input('country_code_tld',  array(
                                    'options' => $countryList,
                                    'type' => 'select',
                                    'empty' => __("-- Select your country --",true),
                                    'label' => __("Select your country",true)
                                )
                            );
                             echo  $form->input('city_name',  array(
                                    'options' => array(),
                                    'type' => 'select',
                                    'empty' => __("-- Select a country first --",true),
                                    'label' => __("Select your city",true)
                                )
                            );
                            ?>
                            
                          <?php
                           echo  $form->input('country_name', array('type'=>'hidden'));
                           echo  $form->input('country_code_iso3', array('type'=>'hidden'));
                           echo  $form->input('region', array('type'=>'hidden'));
                           echo  $form->input('latitude', array('type'=>'hidden'));
                           echo  $form->input('longitude', array('type'=>'hidden'));
 
                           echo $this->Form->end($options);
                     ?>
                        
                  </section>
                  </div>
                  
                  <div id="tablesAndGraphs" class="span8 tabbable well">
                         <ul class="nav nav-pills">
                            <li ><a  data-toggle="pill" data-target="#temptables">Past Temperatures Tables</a></li>
                            <li class="active"><a  data-toggle="pill" data-target="#tempgraphs">Past Temperatures Graphs</a></li>
                            <li><a data-toggle="pill" data-target="#futuretemps">Future Predictions Graphs</a></li>
                            <li><a data-toggle="pill" data-target="#futuregraphs">Future Predictions Graphs</a></li>
                        </ul> 
                      <div class="tab-content">          
                          <div id="tempgraphs" class="tab-pane active">
                                <div id="avgTempByDecadeChart">
                                    
                                </div>
                                <br>
                                <p class="help-block"><strong>Note:</strong> You can hover over the data points to view the exact value for that point in a too</p>
                                <br> 
                                <div id="avgTempByMonthChart">
                                    
                                </div>
                                <br>
                                <div id="futureAvgTempAnualChart">
                                </div>
                          </div>          
                          
                          <div id="temptables" class="tab-pane ">
                              <table class="table table-striped table-bordered table-condensed">
                                <caption><b><?php echo $user_geolocation['Geolocation']['country_name']  ?>: Average temperatures per decade</b> (Data from the World Bank Climate Change API)</caption>
                                <thead>
                                    
                                     <tr>
                                    <?php 
                                        if(is_array($decadeTempAverages['TemperatureValue']))
                                        {
                                            foreach ($decadeTempAverages['TemperatureValue'] as $tempByDecade) 
                                            {
                                    ?>
                                   
                                        <th><?php echo $tempByDecade['year']  ?> </th>
                                    <?php
                                            }
                                        }
                                    ?>
                                    </tr>
                                </thead>
                                <tbody>
                                     <tr>
                                    <?
                                        if(is_array($decadeTempAverages['TemperatureValue']))
                                        {
                                            foreach ($decadeTempAverages['TemperatureValue'] as $tempByDecade) 
                                            {
                                    ?>
                                   
                                        <td>
                                            <?php
                                              
                                                 $celsius = round($tempByDecade['data'], 2);
                                                  
                                            ?> 
                                           <p> <?php echo $celsius; ?> C</p>
                                        </td>
                                   
                                    <?php
                                            }
                                        }
                                    ?>
                                     </tr>
                                      <tr>
                                    <?
                                        if(is_array($decadeTempAverages['TemperatureValue']))
                                        {
                                            foreach ($decadeTempAverages['TemperatureValue'] as $tempByDecade) 
                                            {
                                    ?>
                                   
                                        <td>
                                            <?php
                                                $celsius = $tempByDecade['data'] ;
                                                $fahr = round(($celsius * 1.8) + 32, 2);
                                                  
                                            ?> 
                                           <p> <?php echo $fahr; ?> F</p>
                                        </td>
                                   
                                    <?php
                                            }
                                        }
                                    ?>
                                     </tr>
                                 </tbody>
                              </table>
                              
                              
                              <table class="table table-striped table-bordered table-condensed">
                                <caption><b><?php echo $user_geolocation['Geolocation']['country_name']  ?>: Average monthly temperatures from 1901 to 2009</b> (Data from the World Bank Climate Change API)</caption>
                                <thead>
                                    
                                     <tr>
                                           <th><?php echo __("January");?></th>
                                          <th><?php echo __("Februry");?></th>
                                          <th><?php echo __("March");?></th>
                                          <th><?php echo __("April");?></th>
                                          <th><?php echo __("May");?></th>
                                          <th><?php echo __("June");?></th>
                                          <th><?php echo __("July");?></th>
                                          <th><?php echo __("August");?></th>
                                          <th><?php echo __("September");?></th>
                                          <th><?php echo __("October");?></th>
                                          <th><?php echo __("November");?></th>
                                          <th><?php echo __("December");?></th>
                                               
                                    </tr>
                                </thead>
                                <tbody>
                                     <tr>
                                    <?
                                        if(is_array($monthlyTempAverages['TemperatureValue']))
                                        {
                                            foreach ($monthlyTempAverages['TemperatureValue'] as $tempByMonth) 
                                            {
                                    ?>
                                   
                                        <td>
                                            <?php
          
                                                $celsius = round($tempByDecade['data'], 2);
                                                  
                                            ?> 
                                           <p> <?php echo  $celsius = round($tempByDecade['data'], 2);; ?> C</p>
                                        </td>
                                   
                                    <?php
                                            }
                                        }
                                    ?>
                                     </tr>
                                      <tr>
                                    <?
                                        if(is_array($monthlyTempAverages['TemperatureValue']))
                                        {
                                            foreach ($monthlyTempAverages['TemperatureValue'] as $tempByMonth) 
                                            {
                                    ?>
                                   
                                        <td>
                                            <?php
                                               $celsius = $tempByDecade['data'] ;
                                                $fahr = round(($celsius * 1.8) + 32, 2);
                                                  
                                            ?> 
                                           <p> <?php echo $fahr; ?> F</p>
                                        </td>
                                   
                                    <?php
                                            }
                                        }
                                    ?>
                                     </tr>
                                 </tbody>
                              </table>
                              
                              
                              <div id="disastersContainer">
                                <p>
                                 
                                <?php
                                  $this->Paginator->options(array(
                                                'update' => '#disastersContainer',
                                                'url' => array_merge(array('updateContainerId' => "disastersContainer"), $this->passedArgs),
                                                'evalScripts' => true,
                                                'before' => $js->get('#disastersContainer')->effect('fadeOut', array('buffer' => false)),
                                                'success' => $js->get('#disastersContainer')->effect('fadeIn', array('buffer' => false))
                                                ));
                                  
                                ?>  
                                </p>
                               
                               <table class="table table-striped table-bordered table-condensed">
                                <caption><b><?php echo $user_geolocation['Geolocation']['country_name']  ?>: Natural Disasters </b> from EM-DAT International Disaster Database (More up to date data coming soon</caption>
                                <thead>
                                    
                                     <tr>
                                
                                   
                                        <th><?php echo $this->Paginator->sort( __('Disaster Type',true),'disaster_type');?></th>
                                        <th><?php echo $this->Paginator->sort(__('Victim Toll',true), 'total_killed');?></th>
                                        <th><?php echo $this->Paginator->sort( __('People Affected',true),'total_affected');?></th>
                                        <th><?php echo $this->Paginator->sort(__('Estimated Damage',true) . "(000 US $)", 'estimated_damage');?></th>
                                        <th><?php echo $this->Paginator->sort( __('Year',true),'start_year');?></th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                       <?
                                        if(is_array($monthlyTempAverages))
                                        {
                                            foreach ($disasters as $disasterObject) 
                                            {
                                                $disaster = $disasterObject['Disaster'];
                                                //debug($disaster);
                                    ?>
                                     <tr>
                                 
                                   
                                        <td>
                                            <?php echo $disaster['disaster_type']  ?> 
                                        </td>
                                        <td>
                                            <?php echo $disaster['total_killed']  ?> 
                                        </td>
                                        <td>
                                            <?php echo $disaster['total_affected']  ?> 
                                        </td>
                                        <td>
                                            <?php echo $disaster['estimated_damage']  ?> 
                                        </td>
                                        <td>
                                            <?php echo $disaster['start_year']  ?> 
                                        </td>
                                   
                                    <?php
                                           if(count($disasters) == 0)
                                           {
                                      ?>
                                         
                                         <td colspan="5"><p>No natural disaster data to report on this country</p></td>
                                        <?php 
                                           }
                                        ?>
                                     </tr>
                                      <?php    
                                       
                                            }
                                        }
    
                                    ?>
                                     
                                 </tbody>
                              </table>
                              <p>
                                <?php
                                echo $this->Paginator->counter(array(
                                'format' => __('Page %page% of %pages%, showing %current% entries out of %count% total, starting on record %start%, ending on %end%', true)
                                ));
                                ?>  
                            </p>
                        
                            <div class="pagination pagination-centered">
                                <ul>
                                    <?php echo $this->Paginator->prev('<< ' . __('previous', true), array("tag"=>"li"), null, array('escape'=>false, 'class'=>'disabled',"tag"=>"li", "render_anchor"=>true));?>
                                    <?php echo $this->Paginator->numbers(array(
                                                       
                                                        "active_link"=>"active",
                                                        "separator" => "",
                                                        "tag"=>"li"
                                         ));?>
                                 
                                    <?php echo $this->Paginator->next(__('next', true) . ' >>', array("tag"=>"li"), null, array('escape'=>false,'class' => 'disabled', "tag"=>"li","render_anchor"=>true));?>
                                </ul>
                            </div>
                        </div>  
                        </div> 
                      </div>
                  </div>
            </div>
            <div class="tab-pane" id="2">
                <div class="well">
                  <h3> Favorite locations </h3>
                    <ul>
                        <li>
                            This will allow users to mark as favorite certain locations for quick view. It will have the same features as the main page but “browsable” based on locations
                        </li>
                    </ul>
                </div>
            </div>
             <div class="tab-pane" id="3">
                 <div class="well">
                <h3>Friend G-Warming Info</h3>
                <ul>
                    <li>
                        This will display user friends (leveraging Facebook, Twitter APIs etc…) to get temperature and disaster data according to friends location
                    </li>
                </ul>
                </div>
            </div>
             <div class="tab-pane" id="4">
                 <div class="well">
                <h3>  Take Action</h3>
                <ul>
                    <li>
                        Will display suggestions, call to actions, and advices on what to do to minimize the effect of global warming in your local area and in your personal life.
                    </li>
                    <li>
                        Non-profits working for awareness on Global Warming will also be able to use MyWarming as an online tool to direct citizens in positive awareness and action campaigns.
                    </li>
                </ul>
                </div>
            </div>
            
        </div>
    </div>
	
	<script>
   	     
	</script>
	
	
	
</div>
<?php

?>