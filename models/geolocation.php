<?php 

class Geolocation extends AppModel
{
	var $useTable = false;
	public $useDbConfig = 'wu_geolocation';
	
	var $validate = array(
	"location"=>array(
				'notempty' => array(
								'rule' => array('notempty'),
								'message' => "Please select a location, either a city name or country from the autosuggestions presented as you type",
	//'allowEmpty' => false,
				'required' => true,
	//'last' => false, // Stop validation after this rule
	//'on' => 'create', // Limit validation to 'create' or 'update' operations
	)
	)
	);
	
}


?>