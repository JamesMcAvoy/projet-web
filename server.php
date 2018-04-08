#!/usr/bin/php
<?php

use React\EventLoop\Factory,
    React\Http\Server,
    React\Http\Response,
    React\Socket\Server as HttpSocketServer,
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
    foreach($config as $key => $value) define($key, $value);
} else die('Fichier de configuration introuvable');

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/src/routes.php';

//Database connection booting
Models\Database::boot();

/**
 * Run the server
 */
$loop = Factory::create();

$server = new Server([
    new WebrootPreloadMiddleware(
        __DIR__.'/public'
    ),

    new SessionMiddleware(
        CONF_COOKIE_NAME,
        new ArrayCache()
    ),

    /**
     * @todo Cesi user middleware role unauthorized pages (403)
     */

    function($request) use(&$router) {

        $response = new Response(
            200,
            array(
                'Content-Type' => 'text/html',
                'X-Powered-By' => 'PHP/'.phpversion()
            )
        );

        //Match HTTP request
        return $router->run($request, $response);

    }
]);

$server->on('error', function(Throwable $e) {
    //Error 500 handling
    echo '« ', $e->getMessage(), ' » in ', $e->getFile(), ' line ', $e->getLine(), PHP_EOL;
});

$socket = new HttpSocketServer(CONF_PORT_SERVER, $loop);
$server->listen($socket);
echo "Server running at http://127.0.0.1:".CONF_PORT_SERVER."\n";

$loop->run();