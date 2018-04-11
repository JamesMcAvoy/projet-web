<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class logout extends Controller {



    public static function logout($req,$res){

        $session = parent::getSession($req);
        $params = $req->getQueryParams();

        if(isset($params['token'])){
            if($params['token'] == $session['token']){
                $session->end();
                return $res->withStatus(302)->withHeader('Location', '/index');
            }
            else{
                return $res->withStatus('error')->withHeder('location', '/error');
            }
        }
        

    }

/*
    vérifier si paramettre token dans logout= à son token csrm dans sa session
    si oui redirigé vers l'index
    sinon dans le root avec erreur
    destruction de sa session
*/
}

?>