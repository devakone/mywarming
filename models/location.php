<?php 

class Location extends AppModel
{
	var $useTable = false;
	var $_schema = array(
	    'id' => array('type' => 'integer', 'length' => 11),
	    'longitude' => array('type' => 'integer', 'length' => 11),
	    'latitude' => array('type' => 'string', 'length' => 11),
		'ip' => array('type' => 'string', 'length' => 30),
		'city' => array('type' => 'string', 'length' => 30),
		'state' => array('type' => 'string', 'length' => 30),
		'country' => array('type' => 'string', 'length' => 30),
	);
}


?>