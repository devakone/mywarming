<?php 

class Temperature extends AppModel
{
	var $useTable = false;
	var $_schema = array(
	    'id' => array('type' => 'integer', 'length' => 11),
	    'year' => array('type' => 'integer', 'length' => 11),
	    'month' => array('type' => 'string', 'length' => 11),
		'day' => array('type' => 'string', 'length' => 11),
		'temperature' => array('type' => 'string', 'length' => 11),
	);
}


?>