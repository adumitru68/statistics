<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/21/2019
 * Time: 11:33 PM
 */

namespace JL\Controllers\Site;


use JL\Core;
use Slim\Http\Request;
use Slim\Http\Response;

class HomeController
{

	/**
	 * @param Request  $request
	 * @param Response $response
	 * @param array    $args
	 * @return Response
	 */
	public function __invoke(Request $request, Response $response, array $args = []) {
		var_dump(Core::helper()->stringTools()->sha512('Ana are mere'));
		return $response->write('Test route');
	}

}