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
    
class IplocationSource extends DataSource 
{
   
	
	protected $_schema = array
    (
    	"Iplocation" => array
    	(
			"id"=>array
			(
    
  				'type' => 'integer',
    			'null' => true,
    			'key' => 'primary',
    			'length' => 11,
			    		
			),
			"ipAddress"=>array
			(
    
  				'type' => 'string',
    			'null' => true,
    			'key' => 'primary',
    			'length' => 60,
			    		
			),
		    "countryName"=>array
		    (
		    
      			'type' => 'string',
        		'null' => true,
        		'key' => 'primary',
        		'length' => 60,
		     
			),
		    "countryCode"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' => 2,
		     
		    ),
		    "regionName"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' => 60,
		     
		    ),
		    "cityName"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' => 60,
		     
		    ),
		    "latitude"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' => 60,
		     
		    ),
		    "longitude"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' =>60,
		     
		    ),
		    "timeZone"=>array
		    (
		    
          		'type' => 'string',
            	'null' => true,
            	'key' => 'primary',
            	'length' => 60,
		     
		    )
    	)
    
    
    );
       
	protected $apiUrl = "";
    
	public function __construct($config) 
	{
    	$auth = "key={$config['api_key']}";
    	$url = "{$config['url']}";
    	$this->apiUrl =  "{$url}?{$auth}&format=json&";
    	debug($this->apiUrl);
    	$this->connection = new HttpSocket();
    	parent::__construct($config);
    }
    

   
    
    public function listSources() 
    {
    	return array('Iplocation');
    }
    
    public function read($model, $queryData = array()) 
    {
    	if (!isset($queryData['conditions']['ip'])) 
    	{
    		$queryData['conditions']['ip'] = "74.125.45.100";
    	}
    	$query = "ip=";
    	$query .= "{$queryData['conditions']['ip']}.json";
    	$response = json_decode($this->connection->get($this->apiUrl . $query), true);
    	//debug($response);
    	$record = array('Iplocation' => $response);
    	$record['response'] = array("statusMessage"=>$response['statusMessage'], "statusCode" => $response['statusCode'] );
    	unset($record['Iplocation']['statusCode'] );
    	unset($record['Iplocation']['statusMessage'] );
    	
    	return $record;
    }
    	
   
    	
    public function describe($model)
    {
    	return $this->_schema['location'];
    }
}
?>
