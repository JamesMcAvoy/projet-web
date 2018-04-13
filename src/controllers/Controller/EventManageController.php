<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class EventManageController extends Controller {

    public static function eventManage($req, $res){

        $session = parent::getSession($req)->getContents();
        $params = $req->getQueryParams();
        
        

        $post = $req->getParsedBody();       

        $user = Model\Event::create([
            'event_title'       => htmlentities($post['event_title']),
            'event'             => htmlentities($post['event']),
            'event_price'       => htmlentities($post['event_price']),
            'start_date'        => htmlentities($post['start_date']),
            'time'              => htmlentities($post['time']),
            'time_between_each' => htmlentities($post['time_between_each']),
            'event_number'      => htmlentities($post['event_number']),
            'event_state'       => htmlentities($post['event_state'])
        ]);
        return $res->withStatus(302)->withHeader('Location', '/evenements');
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