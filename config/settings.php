<?php

use Qpdb\SlimApplication\Router\RouterDetails;
use Qpdb\SlimApplication\Router\RouterService;
use Interop\Container\ContainerInterface;
use Slim\App;

const CM_ROUTER_API = 'apiRouter';
const CM_ROUTER_ADMIN = 'adminRouter';

const CM_ROUTER_DEFAULT = 'siteRouter';

return [

	'use-routers' => [
		CM_ROUTER_API => '/api/',
		CM_ROUTER_ADMIN => '/admin/',
		CM_ROUTER_DEFAULT => '/'
	],

	'routes' => [
		CM_ROUTER_API => __DIR__ . '/routes/api.php',
		CM_ROUTER_ADMIN => __DIR__ . '/routes/admin.php',
		CM_ROUTER_DEFAULT => __DIR__ . '/routes/site.php'
	],

	'response-headers' => [

		CM_ROUTER_API => [
			'Content-Type' => 'application/json; charset=UTF-8',
			'Access-Control-Allow-Origin' => '*'
		],

		CM_ROUTER_ADMIN => [
			'Content-Type' => 'text/html; charset=UTF-8'
		],

		CM_ROUTER_DEFAULT => [
			'Content-Type' => 'text/html; charset=UTF-8'
		],

		'allRouters' => [
			'Access-Control-Allow-Origin' => '*',
			'Access-Control-Allow-Headers' => 'X-Requested-With, Content-Type, Accept, Origin, Authorization',
			'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
			'Allow' => 'GET, POST, PUT, DELETE, OPTIONS',
			'Content-Type' => 'text/html; charset=UTF-8'
		]

	],

	'slim-settings' => [

		'settings' => [
			'httpVersion' => '1.1',
			'responseChunkSize' => 4096,
			'outputBuffering' => 'append',
			'determineRouteBeforeAppMiddleware' => true,
			'displayErrorDetails' => true,
			'addContentLengthHeader' => false,
			'routerCacheFile' => false,
			'php-di' => [
				'use_autowiring' => true,
				'use_annotations' => false,
			]
		],

		App::class => function( ContainerInterface $c ) {
			return new App( $c );
		},

		RouterService::class => function( ContainerInterface $c ) {
			return new RouterService( $c->get( App::class ), $c );
		},

		'notFoundHandler' => function() {
			return new \Qpdb\SlimApplication\Handlers\SlimAppNotFound( null );
		},

		'notAllowedHandler' => function() {
			return new \Qpdb\SlimApplication\Handlers\SlimAppNotAllowed( null );
		},

		'phpErrorHandler' => function( ContainerInterface $c ) {
			return new \Slim\Handlers\PhpError( $c->get( 'settings' )[ 'displayErrorDetails' ] );
		},

		'errorHandler' => function( ContainerInterface $c ) {
			return new \Slim\Handlers\Error( $c->get( 'settings' )[ 'displayErrorDetails' ] );
		},

		'routerType' => function() {
			return RouterDetails::getInstance()->getRouterType();
		},

	],

	'sessionCfg' => [
		'name' => 'JL_JOBLDS00786UHGF',
		'cookie' => [
			'lifetime' => 0,
			'path' => '/',
			'domain' => '.' . \JL\Core::helper()->getServerName(),
			'secure' => isset($_SERVER['HTTPS']),
			'httponly' => true
		],
	],

	'jwt' => [
		'jwt_alg' => 'HS256',
		'jwt_key' => 'hg0059'
	],

	'db_credentials' => [
		'host' => 'localhost',
		'user' => 'ghost',
		'password' => '1234',
		'dbname' => 'statistics'
	],

	'locations' => [
		'templates' => __DIR__ . '/../templates/',
	]
];