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
	
	function afterFind($results) {
		foreach ($results as $key => $val) {
			//UTF8 encode the country name, otherwise nothing displays if there is an accent
			$results[$key]['Country']['country'] = utf8_encode($val['Country']['country']);
		}    return $results;
	}
	
}
?>