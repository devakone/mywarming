<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppModel extends Model {
	
	
	function find($conditions = null, $fields = array(), $order = null, $recursive = null) {
		$doQuery = true;
		// check if we want the cache
		if (!empty($fields['cache'])) {
			$cacheConfig = null;
			// check if we have specified a custom config, e.g. different expiry time
			if (!empty($fields['cacheConfig']))
				$cacheConfig = $fields['cacheConfig'];
	
			$cacheName = $this->name . '-' . $fields['cache'];
			// if so, check if the cache exists
			if (($data = Cache::read($cacheName, $cacheConfig)) === false) {
				$data = parent::find($conditions, $fields, $order, $recursive);
				Cache::write($cacheName, $data, $cacheConfig);
			}
			$doQuery = false;
		}
		if ($doQuery)
			$data = parent::find($conditions, $fields, $order, $recursive);
		return $data;
	}
}
