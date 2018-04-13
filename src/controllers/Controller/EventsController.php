<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class Events extends Controller {


    public static function event($req, $res){

        $eventUp = Event::where('event_state', '=', 'up');
        $eventEnded = Event::where('event_state', '=', 'ended');
        $eventBlocked = Event::were('event_state', '=', 'Blocked');
        $event = [];
        $event->setContent([
            'up' => $eventUp,
            'ended' => $eventEnded,
            'blocked' => $eventBlocked
        ]);

        return self::render($res,'evenements',$event);
    }

    public static function eventMonth($req, $res){
        $date = time() - (21*24*60*60);
        $event = Event::where('event_state', '=', 'up' && 'start_date', '>', $date->format('U = Y-m-d H:i:s'));
        return self::render($res,'evenements',$event);
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