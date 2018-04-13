<?php

namespace Controllers\Controller;

use Controllers\Controller;

final class ErrorController extends Controller {

    public static function error403($req, $res) {

        return self::abort($res, 403, ['message' => "l'accès est interdit", 'background' => 'BG.png', 'smiley' => 'AH.png']);

    }

    public static function error404($req, $res) {

        return self::abort($res, 404, ['message' => 'la page '.$req->getUri()->getPath()." n'existe pas", 'background' => 'BG.png', 'smiley' => 'AH.png']);

    }

    public static function error405($req, $res) {

        return self::abort($res, 405, ['message' =>'la méthode '.$req->getMethod()." n'est pas authorisé", 'background' => 'BG.png', 'smiley' => 'AH.png']);

    }

    public static function error500($req, $res, $msg) {

    	return self::abort($res, 500, ['message' => $msg, 'background' =>        'BG.png', 'smiley' => 'AH.png']);

    }

}