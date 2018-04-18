<?php

namespace Controllers\Controller;

use Controllers\Controller,
    Models\Model;

final class LogoutController extends Controller {

    /**
     * logout and kill session
     */
    public static function logout($req, $res) {

        $session = parent::getSession($req);
        $params = $req->getQueryParams();

        //If token exist
        //and active session
        //with good user
        if(isset($params['token']) &&
           self::sessionUserActive($req) &&
           ($params['token'] == $session->getContents()['user']['token'])
        ) {
        	//destroy session
            $session->end();
        }
        return $res->withStatus(302)->withHeader('Location', '/');

    }
    
}