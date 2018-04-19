<?php

use PsrRouter\PsrRouter as Router,
    React\Http\Io\ServerRequest as Request,
    React\Http\Response,
    Controllers\Controller as Control;

$router = new Router();

/**
 * HTTP errors
 */
$router->setParam('404', function(Request $request, Response $response) {

    return Control\ErrorController::error404($request, $response);

});

$router->setParam('405', function(Request $request, Response $response) {

    return Control\ErrorController::error405($request, $response);

});

/**
 * Index
 */
$router->get('/', function(Request $request, Response $response) {

    return Control\IndexController::index($request, $response);

});

/**
 * Login/logout
 */
$router->get('/login', function(Request $request, Response $response) {

    return Control\LoginController::index($request, $response);

});

$router->post('/login', function(Request $request, Response $response) {

    return Control\LoginController::login($request, $response);

});

$router->get('/logout', function(Request $request, Response $response) {

    return Control\LogoutController::logout($request, $response);

});

/**
 * Register
 */
$router->get('/register', function(Request $request, Response $response) {
    
    return Control\RegisterController::index($request, $response);

});

$router->post('/register', function(Request $request, Response $response) {

    return Control\RegisterController::register($request, $response);

});

/**
 * Profil
 */
$router->get('/profil', function(Request $request, Response $response) {
    
    return Control\ProfilController::index($request, $response);

});

/**
 * Events/ideas
 */
$router->get('/events', function(Request $request, Response $response) {
    
    return Control\EventController::index($request, $response);

});

$router->get('/events/{id}', function(Request $request, Response $response, $slug) {
    
    return Control\EventController::indexEvent($request, $response, $slug['id']);

});

$router->get('/events/register/{id}', function(Request $request, Response $response, $slug) {
    
    return Control\EventController::register($request, $response, $slug['id']);

});

$router->get('/events/img/{id}', function(Request $request, Response $response, $slug) {
    
    return Control\EventController::image($request, $response, $slug['id']);

});

$router->post('/events/idea', function(Request $request, Response $response) {
    
    return Control\IdeaController::create($request, $response);

});

$router->post('/ideas/like/{id}', function(Request $request, Response $response, $slug) {

    return Control\IdeaController::like($request, $response, $slug['id']);

});

$router->get('/ideas/block/{id}', function(Request $request, Response $response, $slug) {

    return Control\IdeaController::blockIdea($request, $response, $slug['id']);

});
$router->get('/events/block/{id}', function(Request $request, Response $response, $slug) {

    return Control\EventController::blockEvent($request, $response, $slug['id']);

});

/**
 * Add/get pictures
 */
$router->get('/picture/{id}', function(Request $request, Response $response, $slug) {

    return Control\PictureController::image($request, $response, $slug['id']);

});

$router->post('/picture/like/{id}', function(Request $request, Response $response, $slug) {

    return Control\PictureController::like($request, $response, $slug['id']);

});
$router->post('/events/picture/{id}', function(Request $request, Response $response, $slug) {

    return Control\PictureController::newPicture($request, $response, $slug['id']);

});

/**
 * Shop
 */
$router->get('/shop', function(Request $request, Response $response) {
    
    return Control\ShopController::index($request, $response);

});

$router->get('/shop/img/{id}', function(Request $request, Response $response, $slug) {
    
    return Control\ShopController::image($request, $response, $slug['id']);

});

$router->get('/shop/{id}', function(Request $request, Response $response, $slug) {
    
    return Control\ShopController::add($request, $response, $slug['id']);

});

$router->get('/basket', function(Request $request, Response $response) {
    
    return Control\ShopController::validate($request, $response);

});


/**
 * @todo
 */
$router->get('/profil/admin', function(Request $request, Response $response) {

    return Control\AdminController::index($request, $response);

});

$router->get('/CreateEvent', function(Request $request, Response $response) {
    
    return Control\AdminController::index($request, $response);

});
$router->post('/CreateEvent', function(Request $request, Response $response) {

    return Control\AdminController::eventCreate($request, $response);

});