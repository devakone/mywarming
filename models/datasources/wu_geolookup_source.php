<?php
    /**
     * Twitter DataSource
     *
     * Used for reading and writing to Twitter, through models.
     *
     * PHP Version 5.x
     *
     * CakePHP(tm) : Rapid Development Framework (http://www.cakephp.org)
     * Copyright 2005-2009, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
     *
     * Licensed under The MIT License
     * Redistributions of files must retain the above copyright notice.
     *
     * @filesource
     * @copyright Copyright 2009, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
     * @link http://cakephp.org CakePHP(tm) Project
     * @license http://www.opensource.org/licenses/mit-license.php The MIT License
     */
    App::import('Core', 'HttpSocket');
    
class WuGeolookupSource extends DataSource 
{
    protected $_schema = array
    (
    	"Geolocation" => array
    	(
			"id"=>array
			(
    
  				'type' => 'integer',
    			'null' => true,
    			'key' => 'primary',
    			'length' => 11,
			    		
			),
			"type"=>array
			(
    
  				'type' => 'string',
    			'null' => true,
    			'key' => 'primary',
    			'length' => 11,
			    		
			),
		    "country"=>array
		    (
		    
      			'type' => 'string',
        		'null' => true,
        		'key' => 'primary',
        		'length' => 11,
		     
			),
		    "country_iso3166"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' => 2,
		     
		    ),
		    "country_name"=>array
		    (
		    
              		'type' => 'string',
                	'null' => true,
                	'key' => 'primary',
                	'length' => 60,
		     
		    ),
		    "state"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' => 60,
		     
		    ),"city"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' => 60,
		     
		    ),"tz_short"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' => 60,
		     
		    ),"tz_long"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' =>60,
		     
		    ),"lat"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' => 60,
		     
		    ),"lon"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' => 60,
		     
		    ),"zip"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' => 60,
		     
		    ),"requesturl"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' => 60,
		     
		    ),"magic"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' => 60,
		     
		    ),"wmo"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' => 60,
		     
		    ),"l"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' => 60,
		     
		    ),"wuiurl"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' =>60,
		     
		    )
    
    	)
    
    
    );
       
	protected $apiUrl = "";
    
	public function __construct($config) 
	{
    	$auth = "{$config['api_key']}";
    	$feature = "{$config['feature']}";
    	$this->apiUrl =  "http://api.wunderground.com/api/{$auth}/$feature/";
    	$this->connection = new HttpSocket();
    	parent::__construct($config);
    }
    

   
    
    public function listSources() 
    {
    	return array('Geolocation');
    }
    
    public function read($model, $queryData = array()) 
    {
    	if (!isset($queryData['conditions']['location'])) 
    	{
    		$queryData['conditions']['location'] = "Dakar";
    	}
    	$query = "/q/";
    	$query .= "{$queryData['conditions']['location']}.json";
    	$response = json_decode($this->connection->get($this->apiUrl . $query), true);
    	//debug($response);
    	$record = array('Geolocation' => $response['location']);
    	$record['stations'] = $response['location']['nearby_weather_stations'];
    	unset($record['Geolocation']['nearby_weather_stations'] );
    	$record['response'] = $response['response'];
    
    	
    	return $record;
    }
    	
   
    	
    public function describe($model)
    {
    	return $this->_schema['location'];
    }
}
?>
