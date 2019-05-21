<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/21/2019
 * Time: 5:02 PM
 */

return [
	'app_name' => 'Job Leads statistics application',
	'endpoints' => [
		[
			'output' => 'overall amount of taxes collected per state',
			'url' => '/api/taxes/sum/state/{id}/',
			'method' => 'GET'
		],
		[
			'output' => 'average amount of taxes collected per state',
			'url' => '/api/taxes/avg/state/{id}/',
			'method' => 'GET'
		],
	],
];