<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/21/2019
 * Time: 5:32 AM
 */

namespace JL\Helpers;


use Qpdb\Common\Prototypes\Traits\AsSingletonPrototype;
use Qpdb\SlimApplication\Config\ConfigService;

class AppHelper
{

	use AsSingletonPrototype;

	public function stringTools() {

	}

	/**
	 * @return string
	 */
	public function getServerName(): string {
		return str_ireplace( 'www.', '', filter_input( INPUT_SERVER, 'SERVER_NAME', FILTER_DEFAULT ) );
	}

	/**
	 * @return string
	 */
	public function getServerProtocol():string {
		return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
	}

	/**
	 * @return string
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 */
	public function getTemplatePath(): string {
		return ConfigService::getInstance()->getProperty('locations.templates');
	}


}