<?php 

class User extends AppModel
{
	var $_schema = array(
	    'username' => array('type' => 'string', 'length' => 30),
	    'password' => array('type' => 'string', 'length' => 30),
	    'email' => array('type' => 'string', 'length' => 30),
	    'location_id' => array('type' => 'integer')
	);
}


?>