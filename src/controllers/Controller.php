<?php

namespace Controllers;

use WyriHaximus\React\Http\Middleware as SessionMiddleware,
    React\Http\Io\ServerRequest as Request,
    React\Http\Response,
    Philo\Blade\Blade;

abstract class Controller {

    /**
     * @var Philo\Blade\Blade
     */
    protected static $blade;

    /**
     * Create the templating engine object
     * @param void
     * @return void
     */
    protected static function bootBlade() {

        self::$blade = new Blade(dirname(__DIR__).'/..'.CONF_VIEWS_FOLDER, dirname(__DIR__).'/..'.CONF_CACHE_FOLDER);
    
    }

    /**
     * Return a Response with a body from a blade template
     * @param String $template
     * @param Array $params
     * @return React\Http\Response
     */
    public static function render(Request $request, Response $response, String $template, Array $params = []) : Response {

        if(is_null(self::$blade))
            self::bootBlade();

        $stream = self::$blade->view()->make($template, $params)->render();
        $body = $response->getBody();
        $body->write($stream);

        return $response->withBody($body);

    }

    /**
     * Return the current session stored in CONF_COOKIE_NAME
     * @param React\Http\Io\ServerRequest $request
     * @return WyriHaximus\React\Http\Middleware\Session
     */
    public static function getSession(Request $request) : SessionMiddleware\Session {

        return $request->getAttribute(SessionMiddleware\SessionMiddleware::ATTRIBUTE_NAME);

    }

    /**
     * Return the Cesi role
     * @todo
     */
    public static function getRole() : String {

        //
        return '';

    }

    /**
     * Error page render
     * @todo
     */
    public static function abort(Request $request, Response $response, int $status, String $page) : Response {

        //
        return $response;

    }

}