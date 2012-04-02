<?php
/**
 * User Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * User Controller
 *
 *
 * @package       cake
 * @subpackage    cake.app
 */

App::import('Core', 'HttpSocket');

class GeolocationsController extends AppController 
{
	var $name = 'Geolocations';
	var $components = array("RequestHandler","Session");
	var $helpers = array( 'Js' => array('Jquery'));
	var $userIP = "";
	var $userCity = "";
	var $userGeolocation = array();
	var $userIplocation = array();
	var $paginate = array(
			'limit' => 10,
			'order' => array(
				'Post.created' => 'desc'
	)
	);
	//var $persistModels = true;
	/*var $cacheAction = array(
			"get_temp_average_by_decade" => '1 mn'
	);*/
	
	
	
	function beforeFilter()
	{
		parent::beforeFilter();
		$ipInfoDbApiInfo = Configure::read("IPInfoDb");
		if(empty($this->currentClientIP))
		{
			$this->userIP = $this->RequestHandler->getClientIP();
		};
		//Read from Session or set the default data
		$app_data = $this->Session->read('app_data');
		//debug($app_data);
		if(empty($app_data))
		{
			
			$this->set_default_info();

		}
	}
	
	function index()
	{
		if(!empty($this->data))
		{
			//debug($this->data);
			$this->Geolocation->set($this->data);
			if($this->Geolocation->validates())
			{
				$geolocationData = $this->data['Geolocation'];
				//debug($geolocationData);
				if(empty($geolocationData['latitude']) && empty($geolocationData['longitude']))
				{
					$this->loadModel('Country');
					$multipleCities = $this->Country->City->find('all', array(
							'fields' => array('City.tld', 'City.city_name', 'City.latitude', 'City.longitude'),
							'conditions' => array(
									'City.city_name LIKE ' => $geolocationData['location'],
							),
							'recursive'=>2
					));
					$this->set('multipleCityMatches',$multipleCities );
					$this->Session->setFlash(__("There were multiple matches for the city you entered. Select the correct one and resubmit!", true),"error");
					$this->set_session_info();
					
				}
				else if(isset($geolocationData['country_code_tld']) || isset($geolocationData['country_code_iso3'])  )
				{
					
					$country_iso3 = $geolocationData['country_code_iso3'];
					//If the user used autocomplete and the countr iso3 code is not present retrieve from DB
					if(empty($country_iso3))
					{
						$this->loadModel('Country');					
						$conditions = array("tld"=> $geolocationData['country_code_tld']);
						$locatedCountry = $this->Country->find('first', compact("conditions") );
						$country_iso3 = $locatedCountry['Country']['iso3'];
					} 
					//Get average by decde
					$this->Session->write("country_iso", $country_iso3 );
					$this->loadModel('TemperatureValue');
					$averageByDecade = array();
					$conditions= array('country_code' => $country_iso3);
					$averageByDecade = $this->TemperatureValue->find('all', compact("conditions"));
					//Get average by month
					$conditions= array('country_code' => $country_iso3, "month"=>true);
					$averageByMonth = $this->TemperatureValue->find('all', compact("conditions"));
					
					$conditions= array();
					$conditions= array('latitude' => $geolocationData['latitude'], 'longitude'=>$geolocationData['longitude'], 'location' => $geolocationData['location'], 'country'=>$geolocationData['country_name']);
					$this->userGeolocation = $this->Geolocation->find('all', compact("conditions"));
					$old_app_data = $this->Session->read("app_data");
					$app_data = array();
					//Set the data to display and write it to session
					$this->set('user_geolocation', $this->userGeolocation);
					$app_data['user_geolocation'] = $this->userGeolocation;
					$this->set('decadeTempAverages', $averageByDecade );
					$app_data['decadeTempAverages'] = $averageByDecade;
					$this->set('monthlyTempAverages', $averageByMonth );
					$app_data['monthlyTempAverages'] = $averageByMonth ;
					$this->set('countryList', $old_app_data['countryList']);
					$app_data['countryList'] = $old_app_data['countryList'];
					//Paginate disaster data
					$this->paginate_disasters();
						
					$this->Session->write('app_data', $app_data);
					
				}
				
			}
			else
			{
				$this->Session->setFlash(__("Could not locate all of the information for the city/country you selected. We set the location to your current one", true),"error");
				$this->set_session_info();
			}
			
		}
		else
		{
		
			$this->set_session_info();
			
		}
	}
	
	protected function paginate_disasters()
	{
		$this->loadModel('Disaster');
		$disasters = array();
		//debug();
		if(isset( $this->userGeolocation['Geolocation']['country_name']))
		{
			$country_name = $this->userGeolocation['Geolocation']['country_name'] ;
		}
		$country_name="";
		//debug($country_name);
		if($country_name == "USA")
		{
			$country_name = "United States";
		}
		$this->paginate = array(
				'conditions' => array("Disaster.country LIKE" =>"%" . $country_name. "%"),
				'limit' => 10,
				'order' => array(
						'Disaster.start_year' => 'desc'
				)
		);
		$disasters = $this->paginate("Disaster");
		$this->set('disasters', $disasters );
		$app_data['disasters'] = $disasters ;
	}
	
	function get_city_list()
	{
		$country_tld = $this->params['url']['country_tld'];
		$this->loadModel('Country');
		$cityCount=  $this->Country->City->find('count', array(
				'conditions' => array(
						'City.tld' =>$country_tld,
						"not"=>array("City.city_name"=>null)
		
				),
				'recursive' => -1,
				
				
					
		));
		$cityList=  $this->Country->City->find('all', array(
				'fields' => array('DISTINCT(City.city_name) AS city_name', 'City.latitude', 'City.longitude'),
				'conditions' => array(
						'City.tld' =>$country_tld,
						"not"=>array("City.city_name"=>null)
						
				),
				'recursive' => -1,
				'order' => array('City.city_name'),
				'limit'=>20000
			
		));
		$cities = array();
		foreach ($cityList as $record)
		{
			$val = $record['City']['latitude'] . "_" . $record['City']['longitude'];
			//debug($record);
			if(!empty($record['City']['city_name']) && $record['City']['city_name'] != null)
			{
				$cities["{$val}"] = utf8_encode($record['City']['city_name']);
			}
		}
		//debug($cityList);
		asort($cities, SORT_STRING);
		$response = array("cities"=>$cities, "count"=>$cityCount);
		$this->set('response', $response);
	}
	
	function search_country()
	{
		$term = $this->params['url']['term'];
		//$connection = new HttpSocket();
		//$response = json_decode($connection->get("http://ws.geonames.org/searchJSON?name_startsWith=" . $term. "&maxRows=5"),true);
		$this->loadModel('Country');
		//$this->loadModel('City');
		$response = array();
		$response = $this->Country->City->find('all',  array(
								"conditions"=>array(
										"OR"=>array(
												"City.city_name LIKE" => $term . "%",											
										)
								),							
								"limit"=>15,
		));
		
		
		//debug($response);
		$this->set("geonames",$response);
		
	}
	
	function twitter_feed()
	{
		
	}
	/*
	 * Write session data to the view
	 */
	protected function set_session_info()
	{
		$app_data = $this->Session->read('app_data');
		$this->userGeolocation = $app_data['user_geolocation'];
		$this->set('user_geolocation', $app_data['user_geolocation']);
		
		$this->set('decadeTempAverages', $app_data['decadeTempAverages']);
				
		$this->set('monthlyTempAverages',$app_data['monthlyTempAverages']);
	
		//$this->set('disasters', $app_data['disasters']);
		
		$this->set('countryList', $app_data['countryList']);
		
		$this->paginate_disasters();
		
	}
	
	protected function set_user_geolocation()
	{
		//if no user geoLocation retrieve it
		if(Configure::read("environment") == "DEV")
		{
			//My local ip
			$this->userIP = "173.66.97.113";
		}
		else
		{
			$this->userIP = $this->RequestHandler->getClientIP();
		}
		$conditions= array('ip' => $this->userIP);
		$this->userGeolocation = $this->Geolocation->find('all', compact("conditions"));
		$currentCity = $this->userGeolocation['Geolocation']['city'];
		$this->loadModel('Country');
		$this->Country->recursive=-1;
		$tld = $this->userGeolocation['Geolocation']['country_iso3166'];
		$locatedCountry = $this->Country->findByTld($tld);
		$country_iso3 = $locatedCountry['Country']['iso3'];
		$this->Session->write("country_iso", $country_iso3);
	}
	
	protected function set_default_info()
	{
		//if no user geoLocation retrieve it
		if(Configure::read("environment") == "DEV")
		{
			//My local ip
			$this->userIP = "173.66.97.113";
		}
		else 
		{
			$this->userIP = $this->RequestHandler->getClientIP();
		}
		//
		//debug($this->userIP);
		$country_iso = "USA";
		if(empty($this->userGeolocation))
		{
			$conditions= array('ip' => $this->userIP);
			$this->userGeolocation = $this->Geolocation->find('all', compact("conditions"));
			$currentCity = $this->userGeolocation['Geolocation']['city'];
		
			$this->loadModel('Country');
			$this->Country->recursive=-1;
			$tld = $this->userGeolocation['Geolocation']['country_iso3166'];
			$locatedCountry = $this->Country->findByTld($tld);
			$country_iso3 = $locatedCountry['Country']['iso3'];
			$this->Session->write("country_iso", $country_iso3);
			/*
			 today = getdate();
				$dailyTemperatures = array("");		
			  for($startYear = 2000; $startYear>1900; $startYear = $startYear - 10)
			 {
			//$conditions = array("location"=>$currentCity, "date"=>$startYear .($today['mon'] >= 10)?$today['mon']:'0'. $today['mon'] . ($today['mday'] >= 10)?$today['mday']: "0".$today['mday']);
			//array_push($dailyTemperatures, $this->Geolocation->find('all', compact("conditions")));
			}
			$this->set('dailyTemperatures', $dailyTemperatures );
			*/
		
		}
		$this->loadModel('TemperatureValue');
		$conditions= array('country_code' => $country_iso3);
		$averageByDecade = $this->TemperatureValue->find('all', compact("conditions"));
		$conditions= array('country_code' => $country_iso3, "month"=>true);
		$averageByMonth = $this->TemperatureValue->find('all', compact("conditions"));
		$conditions= array('country_code' => $country_iso3,  "start"=>"2020", "end"=>"2039");
		$averageByDecadeFuture = $this->TemperatureValue->find('all', compact("conditions"));
		$this->sort_predictions($averageByDecadeFuture);
		//debug($averageByDecadeFuture);
		$this->paginate_disasters();
		$this->loadModel('Country');
		$countriesList = $this->Country->find('list', array(
				'fields' => array('Country.tld', 'Country.country'),
				'recursive' => 0,
				'order'=>'Country.country ASC'
		));
		//debug($countriesList);
		$app_data = array();
		$this->set('user_geolocation', $this->userGeolocation);
		$app_data['user_geolocation'] = $this->userGeolocation;

		$this->set('decadeTempAverages', $averageByDecade );
		$app_data['decadeTempAverages'] = $averageByDecade;

		$this->set('futureDecadeTempAverages', $averageByDecadeFuture );
		$app_data['futureDecadeTempAverages'] = $averageByDecadeFuture ;

		$this->set('monthlyTempAverages', $averageByMonth );
		$app_data['monthlyTempAverages'] = $averageByMonth ;
		
		$this->set('countryList', $countriesList);
		$app_data['countryList'] = $countriesList ;
		$this->Session->write('app_data', $app_data);

	}
	
	protected function sort_predictions($temperatures)
	{
		$sorted_temperatures = array();
		
	}
	
	
	
	function get_temp_average_by_decade()
	{
		$this->loadModel('TemperatureValue');
		$country_iso = $this->Session->read("country_iso");
		$conditions= array('country_code' => $country_iso);
		$averageByDecade = $this->TemperatureValue->find('all', compact("conditions"));
		//debug($averageByDecade);
		$averages= $this->build_world_bank_temperature_response($averageByDecade['TemperatureValue']);
		$extjsResponse = array("success"=>true,"temperatures"=>$averages, "successProperty"=> 'success');
		$this->set('response',$extjsResponse);
	} 
	
	function get_monthly_average()
	{
		$this->loadModel('TemperatureValue');
		$country_iso = $this->Session->read("country_iso");
		$conditions= array('country_code' => $country_iso, "month"=>true);
		$averageByMonth = $this->TemperatureValue->find('all', compact("conditions"));
		//debug($averageByMonth);
		$averages= $this->build_world_bank_temperature_response($averageByMonth['TemperatureValue']);
		$extjsResponse = array("success"=>true,"temperatures"=>$averages, "successProperty"=> 'success');
		$this->set('response',$extjsResponse);
	}
	
	function get_temperature_annual_prediction()
	{
		$this->loadModel('TemperatureValue');
		$country_iso = $this->Session->read("country_iso");
		$conditions= array('country_code' => $country_iso, "start"=>"2020", "end"=>"2039", "temp"=>true);
		$averageAnnual2020_2039 = $this->TemperatureValue->find('all', compact("conditions"));
		//debug($averageByMonth);
		$averages= $this->build_world_bank_future_temperature_response($averageAnnual2020_2039['TemperatureValue']);
		$extjsResponse = array("success"=>true,"temperatures"=>$averages, "successProperty"=> 'success');
		$this->set('response',$extjsResponse);
	}
	
	
	function build_world_bank_future_temperature_response($datasets)
	{
      
		$count = 1;
		$new_dataset = array();
		foreach ($datasets as $dataset	)
		{
			$annualData = $dataset["annualData"][0];
			unset($dataset["annualData"]);
			$dataset["annualData"] = $annualData;
			$dataset["id"] = $count;
			$count++;
			array_push($new_dataset, $dataset);
			
		}	
		return $new_dataset;
    
		
	}
	
	function build_world_bank_temperature_response($averages)
	{
		$count=1;
		$new_averages=array();
		$month_values = array(
				"0"=>"January",
				"1"=>"February",
				"2"=>"March",
				"3"=>"April",
				"4"=>"May",
				"5"=>"June",
				"6"=>"July",
				"7"=>"August",
				"8"=>"September",
				"9"=>"October",
				"10"=>"November",
				"11"=>"December",
		);
		if(count($averages) > 0)
		{
			foreach($averages as $average)
			{
				$average['id'] = $count;
				$celsius = $average['data'];
				if(isset($average['month']))
				{
					
					$average['month_celsius_temp'] = $celsius;
					$average['month_fahr_temp'] =round(($celsius * 1.8) + 32, 2);
					$average['year_celsius_temp'] = 0;
					$average['year_fahr_temp'] =0;
					$average['month_label']= $month_values[$average['month']];
				}
				else 
				{
					$average['year_celsius_temp'] = $celsius;
					$average['year_fahr_temp'] =round(($celsius * 1.8) + 32, 2);
					$average['month_celsius_temp'] = 0 ;
					$average['month_fahr_temp'] = 0;			
					
				}	
				unset($average['data']);
				$count++;
				array_push($new_averages, $average);	
			}
		}
		return $new_averages;
	}
	
	
}
