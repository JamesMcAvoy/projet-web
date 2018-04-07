<?php

use React\EventLoop\Factory,
    React\Http\Server,
    React\Http\Response,
    React\Socket\Server as SocketServer,
    React\Cache\ArrayCache,
    WyriHaximus\React\Http\Middleware\SessionMiddleware,
    WyriHaximus\React\Http\Middleware\WebrootPreloadMiddleware;

/**
 * Config
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(file_exists(__DIR__.'/config.json')) {
    $config = json_decode(file_get_contents(__DIR__.'/config.json'), true);
} else die('Config file not found');

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/src/routing.php';

/**
 * Run the server
 */
$loop = Factory::create();

$server = new Server([
    new WebrootPreloadMiddleware(
        __DIR__.'/public'
    ),

    new SessionMiddleware(
        $config['cookie_name'],
        new ArrayCache()
    ),
    
    function($request) use(&$router) {

        $response = new Response(
            200,
            array(
                'Content-Type' => 'text/html',
                'X-Powered-By' => 'PHP '.phpversion()
            )
        );

        //Match HTTP request
        return $router->run($request, $response);
    }
]);

$socket = new SocketServer($config['port_server'], $loop);
$server->listen($socket);

$loop->run();