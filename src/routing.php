<?php

use PsrRouter\PsrRouter as Router;

$router = new Router();

$router->get('/', function($req, $res) use($config) {

    /*
    $session = $req->getAttribute(WyriHaximus\React\Http\Middleware\SessionMiddleware::ATTRIBUTE_NAME);
    $session->begin();

    $session->setContents([
        'foo' => 'bar',
    ]);

    var_export($session->getContents());
    */

    return $res;

});