<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class EventManageController extends Controller {

    public static function index($req, $res) {

        $post = $req->getParsedBody(); 

        $event = Model\Event::where('item_id', '=', $post['item_id'])->get()->first();
        return self::render($res,'ManageEvent',$event);

    }

    public static function eventManage($req, $res){

        $post = $req->getParsedBody();       
        
        $date_time = htmlentities($post['date'])." ".htmlentities($post['hour']);    

        $user = Model\Event::update([
            'event_title'       => htmlentities($post['event_title']),
            'event'             => htmlentities($post['event']),
            'event_price'       => htmlentities($post['event_price']),
            'event_picture'     => htmlentities($post['event_picture']),
            'start_date'        => $date_time,
            'time'              => htmlentities($post['time']),
            'time_between_each' => htmlentities($post['time_between_each']),
            'event_number'      => htmlentities($post['event_number']),
            'event_state'       => htmlentities($post['event_state'])
        ])->first();

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