<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class AdminController extends Controller {

    public static function index($req, $res) {


              return self::render($res, 'admin', [
            'route' => 'admin',
            'user' => self::getSessionUser($req)
        ]);

        }


public static function eventCreate($req, $res){

        $session = parent::getSession($req)->getContents();
        $params = $req->getQueryParams();

        $post = $req->getParsedBody();       
        
        $date_time = htmlentities($post['date'])." ".htmlentities($post['hour']);

        $event = Model\Event::create([
            'event_title'       => htmlentities($post['event_title']),
            'event'             => htmlentities($post['event']),
            'event_price'       => htmlentities($post['event_price']),
            'event_picture'     => htmlentities($post['event_picture']),
            'start_date'        => $date_time,
            'time'              => htmlentities($post['time']),
            'time_between_each' => htmlentities($post['time_between_each']),
            'event_number'      => htmlentities($post['event_number']),
            'event_state'       => htmlentities($post['event_state'])
        ]);
       
        return $res->withStatus(302)->withHeader('Location', '/CreateEvent');
    }
}





