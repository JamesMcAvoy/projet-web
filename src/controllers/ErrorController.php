<?php

namespace Controllers;

final class ErrorController extends Controller {

    public static function error404($req, $res) {

        return self::abort($res, 404, ['message' => $req->getUri()->getPath()]);

    }

    public static function error500($req, $res, $msg) {

    	return self::abort($res, 500, ['message' => $msg]);

    }

}