<?php 

class TemperatureValue extends AppModel
{
	var $useTable = false;
	var $_schema = array(
	    'year' => array('type' => 'integer', 'length' => 11),
		'month' => array('type' => 'integer', 'length' => 11),
	    'data' => array('type' => 'string', 'length' => 11),
	);

	public $useDbConfig = 'worldBankTemp';
}


?>