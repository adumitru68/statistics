<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/21/2019
 * Time: 4:18 AM
 */

namespace JL;


use JL\Helpers\AppHelper;
use Qpdb\PdoWrapper\PdoWrapperService;
use Qpdb\SlimApplication\Config\ConfigService;

class Core
{

	/**
	 * @return ConfigService
	 */
	public static function settings() {
		return ConfigService::getInstance();
	}

	/**
	 * @return PdoWrapperService
	 */
	public static function pdoWrapper() {
		return PdoWrapperService::getInstance();
	}

	/**
	 * @return AppHelper
	 */
	public static function helper() {
		return AppHelper::getInstance();
	}


}