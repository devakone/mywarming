<?php 

class Disaster extends AppModel
{
	var $useTable = false;
	var $_schema = array(
	    'username' => array('type' => 'string', 'length' => 30),
	    'password' => array('type' => 'string', 'length' => 30),
	    'email' => array('type' => 'string', 'length' => 30),
	    'location_id' => array('type' => 'integer')
		'ip' => array('type' => 'string', 'length' => 30)
	);
}


?>