<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class ProfilController extends Controller {

    public static function index($req, $res) {

        //Prevent access if not logged
        if(!self::sessionUserActive($req))
            return $res->withStatus(302)->withHeader('Location', '/');

        return self::render($res, 'profil', [
        	'route' => 'profil',
        	'user' => self::getSessionUser($req),
        	'basket' => self::basket(self::getSessionUser($req)['id'])
        ]);

    }

    /**
     * Return the basket of the user
     */
    public static function basket($id) {

    	return Model\Basket::where('user_id', '=', $id)->get()->first();

    }

}