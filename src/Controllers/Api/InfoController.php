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
	 */
	public function __invoke( Request $request, Response $response, array $args = [] ) {

		return $response->withJson($this->getApiInfo());
	}

	/**
	 * @return array
	 */
	private function getApiInfo() {
		$domain = Core::helper()->getServerProtocol() . Core::helper()->getServerName();
		$apiInfo = [
			'app_name' => 'Job Leads statistics application',
			'endpoints' => [
				[
					'output' => 'overall amount of taxes collected per state',
					'url' => $domain . '/api/taxes/sum/state/{id}/'
				],
				[
					'output' => 'average amount of taxes collected per state',
					'url' => $domain . '/api/taxes/avg/state/{id}/'
				],
			],
		];

		return $apiInfo;
	}

}