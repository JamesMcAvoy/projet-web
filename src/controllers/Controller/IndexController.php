<?php

namespace Controllers\Controller;

use Controllers\Controller;

final class IndexController extends Controller {

    public static function index($req, $res) {

        return self::render($res, 'index', ['hello' => 'ÉcOlE d\'ingénieurs']);

    }
    
    public static function inscription($req, $res) {
        self::getSession($req)->begin();
        var_dump(self::getSession($req)->getContents());
        
        return self::render($res, 'inscription');

    }

}