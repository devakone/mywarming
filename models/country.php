<?php
class Country extends AppModel {
	var $name = 'Country';
	var $useDbConfig = 'default';
	var $displayField = 'country';
	var $primaryKey = 'tld';

	var $actsAs = array('Containable');
	
	var $hasMany = array(
			
		'City'=>array(
				'className' => 'City',
				'foreignKey' => 'tld',
				
				)	
	);
	
}
?>