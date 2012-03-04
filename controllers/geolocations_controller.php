<?php
/**
 * User Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * User Controller
 *
 *
 * @package       cake
 * @subpackage    cake.app
 */
class GeolocationsController extends AppController 
{
	var $name = 'Geolocations';
	var $components = array("RequestHandler");
	var $userIP = "";
	var $userCity = "";
	var $userGeolocation = array();
	var $userIplocation = array();
	
	function beforeFilter()
	{
		parent::beforeFilter();
		$ipInfoDbApiInfo = Configure::read("IPInfoDb");
		if(empty($this->currentClientIP))
		{
			$this->userIP = $this->RequestHandler->getClientIP();
		}
	}
	
	function index()
	{
		//if no user geoLocation retrieve it
		$this->userIP = "173.66.97.113";
		//debug($this->userIP);
		if(empty($this->userGeolocation))
		{
			$conditions= array('ip' => $this->userIP);
			$this->userGeolocation = $this->Geolocation->find('all', compact("conditions"));
		}
		
		$this->set('userInfo', $this->userGeolocation);
	}
}
