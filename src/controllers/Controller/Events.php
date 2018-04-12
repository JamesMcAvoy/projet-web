<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class Events extends Controller {

    public static function eventMonth($req,$res){

        $session = parent::getSession($req)->getContents();
        $params = $req->getQueryParams();

    }

    public static function event($req, $res){

        $session = parent::getSession($req)->getContents();
        $params = $req->getQueryParams();

        $event = Event::all();
        return self::render($res,'evenements',$event);
        if($session->getContent()){

        }



        if(isset($params['token']) && ($params['token'] == $session['user']['token'])){
            switch($session['type']){
                case 'sutdent':
                return $res->withStatus(302)->withHeader('Location', '/evenements');
                break;
                case 'BDE' :
                return $res->withStatus(302)->withHeader('Location', '/evenements');
                break;
                case 'employee':
                return $res->withStatus(302)->withHeader('Location', '/evenements');
                break;
            }
        }
        else{
//get event passer en paramette à la vue
//render
//si utilisateur connecté 
//session get content
//user session user type
//si pas égale tudent
//suppr image
        }

    }

    public static function eventAdministration($req, $res){

        $session = parent::getSession($req)->getContents();
        $params = $req->getQueryParams();

    }

    public static function eventRegistration($req, $res){

        $session = parent::getSession($req)->getContents();
        $params = $req->getQueryParams();

    }

    public static function eventBlock(){
     
        $session = parent::getSession($req)->getContents();
        $params = $req->getQueryParams();

    }


}

/*
évenements du moi visible pour tous
visiteurs : Evenements visible pour tout visiteur
+ BDE : édite évenement avec : description, image, date, prix, récurence; accéder liste inscrit : PDF, CSV.
+ Ceux connectés : inscription à un evenement
+ employés : Bloquer evenement (notification BDE)
*/

?>