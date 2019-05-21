<?php

use Interop\Container\ContainerInterface;
use JL\Controllers\Api\InfoController;
use Slim\App;

return function( App $app, ContainerInterface $container ) {

	$app->add( new \Qpdb\SlimApplication\Middleware\TrailingSlash( true ) );
	$app->add( \Qpdb\SlimApplication\Middleware\RouteValidation::class );

	$app->group('/api', function () use ($app) {
		$app->map(['GET'], '/', InfoController::class);
	});

};