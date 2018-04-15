<?php

namespace Controllers\Controller;

use Controllers\Controller;

final class ErrorController extends Controller {

    public static function error403($req, $res) {

        return self::abort($res, 403, [
            'user' => self::getSessionUser($req),
            'message' => "l'accès est interdit",
            'background' => 'BG.png',
            'smiley' => 'AH.png'
        ]);

    }

    public static function error404($req, $res) {

        return self::abort($res, 404, [
            'user' => self::getSessionUser($req),
            'message' => 'la page '.$req->getUri()->getPath()." n'existe pas",
            'background' => 'BG.png',
            'smiley' => 'AH.png'
        ]);

    }

    public static function error405($req, $res) {

        return self::abort($res, 405, [
            'user' => self::getSessionUser($req),
            'message' =>'la méthode '.$req->getMethod()." n'est pas autorisée",
            'background' => 'BG.png',
            'smiley' => 'AH.png'
        ]);

    }

    public static function error500($req, $res, $msg) {

    	return self::abort($res, 500, [
            'user' => self::getSessionUser($req),
            'message' => $msg,
            'background' => 'BG.png',
            'smiley' => 'AH.png'
        ]);

    }

}