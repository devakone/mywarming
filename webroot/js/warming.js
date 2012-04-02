 var AverageTemperatureByDecadePanel;
 var AverageTemperatureByDecadeStore;
 var AverageTemperatureByMonthStore;
 var AverageTemperatureByDecadeChart;
 var AverageTemperatureByMonthChart;

 
 function createAverageByDecadeChart()
 {
 		if(!Ext.getCmp("averageByDecadeExtChart"))
 		{
 			
 			AverageTemperatureByDecadeChart = Ext.create('Ext.chart.Chart', {
 	            
 	            store: AverageTemperatureByDecadeStore,
 	            //autoRender:true,
 	           // autoShow:true,
 	           // width: 450,
 	           // height: 300,
 	            animate:true,
 	            id:"averageByDecadeExtChart",
 	            legend: {
 	              position: 'bottom',
 	              padding:20
 	           },
 	            axes: 
 	            [
 	                 {
 	                     title: 'Average Temperature',
 	                     type: 'Numeric',
 	                     position: 'left',
 	                     fields: ['year_celsius_temp', 'year_fahr_temp'],
 	                     minimum: -10,
 	                     maximum: 100,
 	                     minorTickSteps: 10
 	                 },
 	                 {
 	                     title: 'Decade',
 	                     type: 'Category',
 	                     position: 'bottom',
 	                     majorTickSteps:10,
 	                     fields: ['year']
 	                 }
 	             ],
 	             
 	             series: 
 	             [
 	                 {
 	                     type: 'line',
 	                      axis: ['left'],
 	                     xField: 'year',
 	                     yField: 'year_celsius_temp',
 	                     title:'Average temperature in Celsius',
 	                     tips: 
 	                     {
 	                    	  trackMouse: true,
 	                    	  width: 140,
 	                    	  height: 28,
 	                    	  renderer: function(storeItem, item) {
 	                    	    this.setTitle(storeItem.get('year') + ': ' + storeItem.get('year_celsius_temp') + ' C');
 	                    	  }
 	                    }
 	                     
 	                 },
 	                 {
 	                     type: 'line',
 	                      axis: ['left'],
 	                     xField: 'year',
 	                     yField: 'year_fahr_temp',
 	                    title:'Average temperature in Fahrenheit',
 	                    tips: 
 	                     {
 	                    	  trackMouse: true,
 	                    	  width: 140,
 	                    	  height: 28,
 	                    	  renderer: function(storeItem, item) {
 	                    	    this.setTitle(storeItem.get('year') + ': ' + storeItem.get('year_fahr_temp') + ' F');
 	                    	  }
 	                    }
 	                 }
 	               
 	               
 	             ]
 	         });
 	         
 	          //Add the chart to the page..  
 	         Ext.create('Ext.panel.Panel', {
 	         layout: 'fit', 
 	         width: 700,
 	         height: 400,
 	         renderTo:'avgTempByDecadeChart',
 	         //autoShow:true,
 	         //autoRender: Ext.Element.get('avgTempByDecadeChart'),
 	         items: AverageTemperatureByDecadeChart
 	         });
 			
 		}
 		
 }
  
 function createMonthlyAverageChart()
 {
 	if(!Ext.getCmp("averageByMonthExtChart"))
	{
			
 		AverageTemperatureByMonthChart = Ext.create('Ext.chart.Chart', {
	            
	            store: AverageTemperatureByMonthStore,
	            //autoRender:true,
	           // autoShow:true,
	           // width: 450,
	           // height: 300,
	            id:"averageByMonthExtChart",
	            legend: {
	                position: 'bottom'
	            },
	            axes: 
	            [
	                 {
	                     title: 'Average Temperature',
	                     type: 'Numeric',
	                     position: 'left',
	                     fields: ['month_celsius_temp','month_fahr_temp'],
	                     minimum: -10,
	                     maximum: 100,
	                     minorTickSteps: 10
	                 },
	                 {
	                     title: 'Month',
	                     type: 'Category',
	                     position: 'bottom',
	                     fields: ['month_label']
	                 }
	             ],
	             series: 
	             [
	                 {
	                     type: 'line',
	                      axis: 'left',
	                     xField: 'month_label',
	                     yField: 'month_celsius_temp',
	                     title:'Average temperature in Celsius(1901-2009)',
	                     tips: 
	                     {
	                    	  trackMouse: true,
	                    	  width: 140,
	                    	  height: 28,
	                    	  renderer: function(storeItem, item) {
	                    	    this.setTitle(storeItem.get('month_label') + ': ' + storeItem.get('month_celsius_temp') + ' C');
	                    	  }
	                    }
	                 },
	                 {
	                     type: 'line',
	                      axis: 'left',                    
	                     xField: 'month_label',
	                     yField: 'month_fahr_temp',
	                     title:'Average temperature in Fahrenheit(1901-2009)',
	                     tips: 
	                     {
	                    	  trackMouse: true,
	                    	  width: 140,
	                    	  height: 28,
	                    	  renderer: function(storeItem, item) {
	                    	    this.setTitle(storeItem.get('month_label') + ': ' + storeItem.get('month_fahr_temp') + ' F');
	                    	  }
	                    }
	                 }
	                
	             ]
	         });
	         
	          //Add the chart to the page..  
	         Ext.create('Ext.panel.Panel', {
	         layout: 'fit', 
	         width: 700,
	         height: 400,
	         renderTo:'avgTempByMonthChart',
	         //autoShow:true,
	         //renderTo: Ext.Element.get('avgTempByMonthChart'),
	         items: AverageTemperatureByMonthChart
	         });
			
		}
 }
 
 function createFutureAnnualAverageTemperatureChart()
 {
	 if(!Ext.getCmp("futureAnnualAverageTemperatureExtChart"))
		{
				
	 		var FutureAnnualAverageTemperatureChart = Ext.create('Ext.chart.Chart', {
		            
		            store: AverageTemperatureByMonthStore,
		            //autoRender:true,
		           // autoShow:true,
		           // width: 450,
		           // height: 300,
		            id:"futureAnnualAverageTemperatureExtChart",
		            axes: 
		            [
		                 {
		                     title: 'Average Temperature 2020-2039',
		                     type: 'Numeric',
		                     position: 'left',
		                     fields: ['annualData'],
		                     minimum: -10,
		                     maximum: 90,
		                     minorTickSteps: 10
		                 },
		                 {
		                     title: 'Month',
		                     type: 'Category',
		                     position: 'bottom',
		                     fields: ['scenario', 'gcm']
		                 }
		             ],
		             series: 
		             [
		                 {
		                     type: 'bar',
		                      axis: 'left',
		                     xField: 'scenario',
		                     yField: 'annualData',
		                     title:'Average Temperature 2020-2039',
		                     tips: 
		                     {
		                    	  trackMouse: true,
		                    	  width: 140,
		                    	  height: 28,
		                    	  renderer: function(storeItem, item) {
		                    	    this.setTitle(storeItem.get('scenario') + ': ' + storeItem.get('annualData') + ' C');
		                    	  }
		                    }
		                 },
		                
		                
		             ]
		         });
		         
		          //Add the chart to the page..  
		         Ext.create('Ext.panel.Panel', {
		         layout: 'fit', 
		         width: 600,
		         height: 300,
		         renderTo:'futureAvgTempAnualChart',
		         //autoShow:true,
		         //renderTo: Ext.Element.get('avgTempByMonthChart'),
		         items: FutureAnnualAverageTemperatureChart
		         });
				
			}
	 
 }
 
Ext.onReady(function()
 {
	//console.log("ExtJS ready");   
	//Define the model
       Ext.define('AverageTemperatureByDecade', {
            extend: 'Ext.data.Model',
            fields: ['year_celsius_temp','year_fahr_temp','id','year'],
            idProperty:'id',
            listeners:[
            
            ]
        });
       
       Ext.define('AverageTemperatureByMonth', {
           extend: 'Ext.data.Model',
           fields: ['month_celsius_temp','month_fahr_temp','id','month_label', 'month'],
           idProperty:'id',
           listeners:[
           
           ]
       });
       
       Ext.define('FutureAnnualAverageTemperature', {
           extend: 'Ext.data.Model',
           fields: ['scenario','gcm','id','variable', 'fromYear','toYear','annualData'],
           idProperty:'id',
           listeners:[
           
           ]
       });
            	       
	  
	   //Define the store
	   AverageTemperatureByDecadeStore = Ext.create('Ext.data.Store', {
            model: 'AverageTemperatureByDecade',
            proxy: 
            {
                type: 'ajax',
                url : AverageTemperatureByDecadeStoreURL,
                reader: 
                {
                    type:'json',
                    idProperty:'id',
                    root:'temperatures'
                }
             
            },
            autoLoad: true ,
            listeners:
            	{
            	 	load:function(store, records, successful, operation, eOpts)
            	 	{
            	 		//console.dir(records);
            	 		createAverageByDecadeChart();
            	 	}
            	 
            	}
          
        });
	   

	   //Define the store
	   AverageTemperatureByMonthStore = Ext.create('Ext.data.Store', {
            model: 'AverageTemperatureByMonth',
            proxy: 
            {
                type: 'ajax',
                url : AverageTemperatureByMonthStoreURL,
                reader: 
                {
                    type:'json',
                    idProperty:'id',
                    root:'temperatures'
                }
             
            },
            autoLoad: true ,
            listeners:
        	{
        	 	load:function(store, records, successful, operation, eOpts)
        	 	{
        	 		//console.dir(records);
        	 		createMonthlyAverageChart();
        	 	}
        	 
        	}
          
        });
	   
	   
	   //Define Future Annual Temperature the store
	  var FutureAnnualAverageTemperatureStore = Ext.create('Ext.data.Store', {
            model: 'FutureAnnualAverageTemperature',
            proxy: 
            {
                type: 'ajax',
                url : FutureAnnualAverageTemperatureStoreURL,
                reader: 
                {
                    type:'json',
                    idProperty:'id',
                    root:'temperatures'
                }
             
            },
           // autoLoad: true ,
            listeners:
        	{
        	 	load:function(store, records, successful, operation, eOpts)
        	 	{
        	 		//console.dir(records);
        	 		//createFutureAnnualAverageTemperatureChart();
        	 	}
        	 
        	}
          
        });
        
   
 }   
); 


$(document).ready(function(){
	//console.log("jQuery ready");   
	$('#appCanvas').tab('show');
	$('#tablesAndGraphs').tab('show');
	$(".alert").alert();
	$('.dropdown-toggle').dropdown();
	
	
    $('#tablesAndGraphs a[data-toggle="pill"]').on('shown', function (e) {
       
        var activatedTabId=  e.target.dataset.target;
        if(activatedTabId == "#tempgraphs")
        { 
        	//createAverageByDecadeChart();
        	//createMonthlyAverageChart();
        }
     })
     
     
   
    
     $('#tablesAndGraphs .nav-pills > li > a').on('click', function (e) {
       
        var activatedTabId=  e.target.dataset.target;
        $(activatedTabId).tab();
        //console.log("tab activated" + activatedTabId);
     })
	
	
	 $("#possibleMatches .possibleMatch").on("click", function(event){
		 
		 var dataKey = event.target.id;
		 var formData =$("#possibleMatches").data() ;
		 var item = formData.data[dataKey];
		 $('#GeolocationCountryCodeTld').val(item.country_code_tld);
		 $('#GeolocationCountryCodeIso3').val(item.country_code_iso3);
		 $('#GeolocationCountryName').val(item.country);
		 $('#GeolocationLatitude').val(item.latitude);
		 $('#GeolocationLongitude').val(item.longitude);
		 $("#GeolocationIndexForm").submit();
	 });
	
	$('#GeolocationCountryCodeTld').on('change', function()
	{
		var input = $(this);
		var selectedCountry = input.val();
		$("#controls").mask("Loading...");

		var jqxhr =  $.getJSON(cityListURL, {country_tld: selectedCountry}, function(response,status, xhr) {  
			$("#GeolocationCityName").html('');
			if(response.cities && response.count )
			{
				 var options = '';
				 
				  $.each(response.cities, function(tld, city_name) {
				    options += '<option value="' + tld + '">' + city_name + '</option>';
				  });
				  $("#GeolocationCityName").html(options);
				  if(response.count >30000)
				  {
					  	alert("There are " + response.count + " cities in this country. Use the Autosuggest Box to find your desired city.");
					  	$("#GeolocationLocation").focus();
						$("#controls").unmask();
				  }
				
			}
			
			$("#controls").unmask();
        	
   		 }).error(function(){alert("There was an error retrieving the data! Try again or use the AutoSuggestion box.");$("#controls").unmask();})
   		
		
		
	}		
	
	)
	
	$('#GeolocationCountryCityName').on('change', function()
		{
			var input = $(this);
			var selected = input.val();
			var geolocations = selected.split("_");
			var latitude = selected[0];
			var longitude = selected[1];
			$('#GeolocationLatitude').val(latitude);
			$('#GeolocationLongitude').val(longitude);	
			$('#GeolocationLocation').val(input.text()) ;
		}		
	
	)
	
	$("#GeolocationIndexForm").submit(function()
		{
			
			
			if(!$('#GeolocationLatitude').val() && !!$('#GeolocationLatitude').val())
			{
				alert("We are missing some information needed to submit. Check and try again ");
				//return false;
			}
			return true;
		}
	);
	
	
	var cache = {},
	lastXhr;
	$( "#GeolocationLocation" ).autocomplete({
		source: function( request, response ) {
			//pass request to server  
			
			var term = request.term;
			if ( term in cache ) {
				response( cache[ term ] );
				return;
			}
			//var url="/geolocations/search_country.json";
			lastXhr = $.getJSON(searchCountryUrl, request, function(data,status, xhr) {  
				
	            //create array for response objects  
	            var suggestions = [];  

	            //process response 
	            //console.dir(data);
	            $.each(data, function(i, item)
	                    {  
	            		//console.dir(item);
	            			suggestions.push(
	            					
	                    			{
	                    				label: item.City.city_name + ", " + item.Country.country + ", " + item.Country.region,
	    								value: item.City.city_name,
	    								country_code: item.Country.iso3,
	    								country_code_tld: item.Country.tld,
	    								country_name: item.Country.country,
	    								latitude: item.City.latitude,
	    								longitude: item.City.longitude

	                    			}
	                        	);  
	       		 		}
		 		);  
	            cache[ term ] = suggestions;
	            if ( xhr === lastXhr ) {
					response( suggestions );
				}
	        	//pass array to callback  
	        	//response(suggestions);  
	   		 });  
		},
		minLength: 2,
		select: function( e, ui ) {
			//console.log( ui.item ?	"Selected: " + ui.item.label :	"Nothing selected, input was " + this.value);
			//console.dir(ui);
			//var country_code = (ui.item && ui.item.country_code)?ui.item.country_code:'USA';
			$('#GeolocationCountryCodeTld').val(ui.item.country_code_tld);
			$('#GeolocationCountryCodeIso3').val(ui.item.country_code);
			$('#GeolocationCountryName').val(ui.item.country_name);
			$('#GeolocationLatitude').val(ui.item.latitude);
			$('#GeolocationLongitude').val(ui.item.longitude);
			

		},
		open: function() {
			//$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
			$('#GeolocationCountryCodeTld').val('');
			$('#GeolocationCountryName').val('');
			$('#GeolocationLatitude').val('');
			$('#GeolocationLongitude').val('');
			
		
		},
		close: function() {
			//$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
		}
	});
	
	
	

	
})