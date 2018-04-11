<?php

namespace Controllers\Controller;

use Controllers\Controller;

final class IndexController extends Controller {

    public static function index($req, $res) {

        return self::render($res, 'inscription');

    }
<<<<<<< HEAD
	
		public static function connexion($req, $res) {

        return self::render($res, 'connexion');

    }    
			public static function inscription($req, $res) {

        return self::render($res, 'inscription');

    }    
		public static function evenements($req, $res) {
=======
    
    public static function evenements($req, $res) {
>>>>>>> 14e38c97cc9be2b127d99d72a5ababacb903aba8

        return self::render($res, 'evenements');

    }

    public static function boite_a_idees($req, $res) {

        return self::render($res, 'boite_a_idees');

    }

    public static function proposer_idee($req, $res) {

        return self::render($res, 'proposer_idee');

    }
}