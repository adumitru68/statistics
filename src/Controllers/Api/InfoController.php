<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/21/2019
 * Time: 4:45 AM
 */

namespace JL\Controllers\Api;


use JL\Core;
use Slim\Http\Request;
use Slim\Http\Response;

class InfoController
{

	/**
	 * @param Request  $request
	 * @param Response $response
	 * @param array    $args
	 * @return Response
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 */
	public function __invoke( Request $request, Response $response, array $args = [] ) {

		return $response->withJson($this->getApiInfo());
	}

	/**
	 * @return array
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 */
	private function getApiInfo() {
		$domain = Core::helper()->getServerProtocol() . Core::helper()->getServerName();
		$apiInfo = Core::settings()->getProperty('api_info');
		foreach ($apiInfo['endpoints'] as $key => $endpoint) {
			$apiInfo['endpoints'][$key]['url'] = $domain . $endpoint['url'];
		}

		return $apiInfo;
	}

}