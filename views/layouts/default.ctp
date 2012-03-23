<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('My Global Warming Dashboard'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('ext-all','bootstrap','bootstrap-responsive','prettify', 'jquery-ui-1.8.18.custom', 'warming', ));
        echo $this->Html->script(array('ext-all-dev','jquery-1.7.1.min','jquery-ui-1.8.18.custom.min','bootstrap-alerts','bootstrap-tab', 'bootstrap-buttons', 'bootstrap-dropdown', 'bootstrap-modal','bootstrap-tooltip', 'bootstrap-popover' , 'bootstrap-twipsy','prettify','warming'));
		echo $scripts_for_layout;
	?>
	<script type="text/javascript">
    if (document.location.hostname.search("indexdot") < 0) {
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-30110137-1']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    }
    </script>
    
    <!--<script type="text/javascript" charset="utf-8" src="http://cdn.sencha.io/ext-4.0.7-gpl/ext-all.js"></script>-->

</head>
<body>
	<div class="container">
		<div class="row">
		    <div class="navbar">
                <div class="navbar-inner">
                  <div class="container" style="width: auto;">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">rap-
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </a>
                    <?php echo $html->link(__("My Global Warming Dashboard (Beta)", true), array("controller"=>"geolocations", "action"=>"index"), array("class"=>"brand")); ?>
                    <div class="nav-collapse">
                      <ul class="nav">
                        <li class="active"><?php echo $html->link(__("Home", true), array("controller"=>"geolocations", "action"=>"index")); ?></li>
                        <li><?php echo $html->link(__("Information", true), array("controller"=>"pages", "action"=>"display", "information")); ?></li>
                        <li><?php echo $html->link(__("Twitter Feed", true), array("controller"=>"geolocations", "action"=>"twitter_feed")); ?></li>
                        <li class="dropdown">
                           <?php echo $html->link(__("What can i do?", true) . "<b class=\"caret\"></b>", array("controller"=>"pages", "action"=>"display", "what_can_i_do"), array("escape"=>false,"class"=>"dropdown-toggle", "data-toggle"=>"dropdown")); ?>
                          
                          <ul class="dropdown-menu">
                            <li><?php echo $html->link(__("Stop Global Warming", true), array("controller"=>"geolocations", "action"=>"twitter_feed")); ?></li>
                          
                          
                          </ul>
                        </li>
                      </ul>
                      <form class="navbar-search pull-left" action="">
                        <input class="search-query span2" placeholder="Search" type="text">
                      </form>
                      <ul class="nav pull-right">
                        <li class="dropdown">
                         
                          <?php echo $html->link(__("Coders4Africa", true) . "<b class=\"caret\"></b>", "http://www.coders4africa.org", array("escape"=>false,"class"=>"dropdown-toggle", "data-toggle"=>"dropdown")); ?>
                          
                          <ul class="dropdown-menu">
                            <li> 
                                <?php echo $html->link(__("About Us", true), "http://www.coders4africa.org/index.php?option=com_content&view=article&id=58&Itemid=89"); ?>
                            </li>
                           
                            <li>
                                <?php echo $html->link(__("Our Projects", true), "http://www.coders4africa.org/index.php?option=com_projectfork&workspace=2&section=projects&Itemid=115&lang=en"); ?>
                            </li>
                            
                            <li>
                                <?php echo $html->link(__("Become a Member", true), "http://www.coders4africa.org/index.php?option=com_community&view=register&Itemid=88"); ?>
                            
                            </li>
                           
                           
                          </ul>
                        </li>
                      </ul>
                    </div><!-- /.nav-collapse -->
                  </div>
                </div><!-- /navbar-inner -->

           
            </div>
		</div>
		<div class="row">
		    <div class="span12">
		   
		            
		       <?php echo $this->Session->flash(); ?>
		        
		    </div>
       
		</div>
		<div class="row">
		      <?php echo $content_for_layout; ?>
		</div>
		<div class="row-fluid footer">
		   
			 <p><i> 
			     Copyright &copy; 2012 <?php echo $this->Html->link(__('Coders4Africa', true), 'http://www.coders4africa.org'); ?>, <?php echo $this->Html->link(__('Index Dot LLC', true), 'http://www.idxdot.net', array("shape"=>"rect")); ?>
		          </i>
		       </p>
		  <p><i>
                This application aggregates data from  <?php echo $this->Html->link(__('The World Bank\'s Climate Data API ', true), 'http://data.worldbank.org/developers/climate-data-api'); ?>, <?php echo $this->Html->link(__('Wunderground Weather API', true), 'http://www.wunderground.com/weather/api/', array()); ?>
                , and from <?php echo $this->Html->link(__('EM-DAT International Disaster Database', true), 'http://www.emdat.be/', array()); ?>
       </i></p>
		</div>
	</div>
	
</body>
</html>