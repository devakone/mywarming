<?php
class City extends AppModel {
	var $name = 'City';
	var $useDbConfig = 'default';
	var $displayField = 'CityName';


	var $belongsTo = array(
			
			'Country' => array(
					'className' => 'Country',
					'foreignKey' => 'tld'
			)
	);
	
}
?>