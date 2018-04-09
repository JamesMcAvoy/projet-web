<?php

namespace Controllers;

final class IndexController extends Controller {

    public static function index($req, $res) {

        return self::render($res, 'index', ['hello' => 'ÉcOlE d\'ingénieurs']);

    }

}