<?php
    /**
     * Ip Location DataSource based on IpLocationDb data
     *
     * Used for resolving IP addresses to country informatiomn.
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
    
class TemperatureValueSource extends DataSource 
{
   
	
	protected $_schema = array
    (
    	"TemperatureValue" => array
    	(
			"year"=>array
			(
    
  				'type' => 'integer',
    			'null' => true,
    			'key' => 'primary',
    			'length' => 11,
			    		
			),
			"month"=>array
			(
			
			  				'type' => 'integer',
			    			'null' => true,
			    			'key' => 'primary',
			    			'length' => 11,
			 
			),
			"data"=>array
			(
    
  				'type' => 'string',
    			'null' => true,
    			'key' => 'primary',
    			'length' => 60,
			    		
			)
		   
		 
    	)
    
    
    );
       
	protected $apiUrl = "http://climatedataapi.worldbank.org/climateweb/rest//v1/country";
    
	public function __construct($config) 
	{
    	
    	$this->connection = new HttpSocket();
    	parent::__construct($config);
    }
    

   
    
    public function listSources() 
    {
    	return array('TemperatureValue');
    }
    
    public function read($model, $queryData = array()) 
    {
    	if (!isset($queryData['conditions']['country_code'])) 
    	{
    		$queryData['conditions']['country_code'] = "USA";
    	}
    	//Temperature by decade
    	if(isset($queryData['conditions']['country_code']) && !isset($queryData['conditions']['month']))
    	{
    		$query = "/cru/tas/decade/";
    		$query .= "{$queryData['conditions']['country_code']}.json";
    	}
    	//temperature by Month
    	if (isset($queryData['conditions']['country_code']) && isset($queryData['conditions']['month']) )
    	{
    		$query = "/cru/tas/month/";
    		$query .= "{$queryData['conditions']['country_code']}.json";
    	}
    	
    	//Temperature Predictions by Year future
    	if (isset($queryData['conditions']['country_code']) && !isset($queryData['conditions']['month']) && isset($queryData['conditions']['temp']) &&  isset($queryData['conditions']['start']) && isset($queryData['conditions']['end']))
    	{
    		$query = "/annualavg/tas/" . $queryData['conditions']['start'] . "/" . $queryData['conditions']['end'] . "/" ;
    		$query .= "{$queryData['conditions']['country_code']}.json";
    	}
    	
    	//Temperature Predictions by Month future
    	if (isset($queryData['conditions']['country_code']) && isset($queryData['conditions']['month']) && isset($queryData['conditions']['temp']) &&   isset($queryData['conditions']['start']) && isset($queryData['conditions']['end']))
    	{
    		$query = "/mavg/tas/" . $queryData['conditions']['start'] . "/" . $queryData['conditions']['end'] . "/" ;
    		$query .= "{$queryData['conditions']['country_code']}.json";
    	}
    	
    	
    	//Precipitation Predictions by Year future
    	if (isset($queryData['conditions']['country_code']) && !isset($queryData['conditions']['month']) && isset($queryData['conditions']['precipitation']) &&  isset($queryData['conditions']['start']) && isset($queryData['conditions']['end']))
    	{
    		$query = "/annualavg/pr/" . $queryData['conditions']['start'] . "/" . $queryData['conditions']['end'] . "/" ;
    		$query .= "{$queryData['conditions']['country_code']}.json";
    	}
    	 
    	//Precipitation Predictions by Month future
    	if (isset($queryData['conditions']['country_code']) && isset($queryData['conditions']['month']) && isset($queryData['conditions']['precipitation']) &&   isset($queryData['conditions']['start']) && isset($queryData['conditions']['end']))
    	{
    		$query = "/mavg/pr/" . $queryData['conditions']['start'] . "/" . $queryData['conditions']['end'] . "/" ;
    		$query .= "{$queryData['conditions']['country_code']}.json";
    	}
    	 
    	
    	
    	//debug($this->apiUrl . $query);
    	$response = json_decode($this->connection->get($this->apiUrl . $query), true);
    	//debug($response);
    	$record = array('TemperatureValue' => $response);
    	
    	
    	return $record;
    }
    	
   
    	
    public function describe($model)
    {
    	return $this->_schema['TemperatureValue'];
    }
}
?>
