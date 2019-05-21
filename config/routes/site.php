<?php

use Interop\Container\ContainerInterface;
use Slim\App;

return function( App $app, ContainerInterface $container ) {

	/** DI container */
	$app->add( new \Qpdb\SlimApplication\Middleware\TrailingSlash( true ) );
	$app->add( \Qpdb\SlimApplication\Middleware\RouteValidation::class );

	$app->map( [ 'GET' ], '/', \JL\Controllers\Site\HomeController::class )->setName('home');

};