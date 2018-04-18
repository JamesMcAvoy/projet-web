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
    
    $file = $req->getUploadedFiles();
    $filePicture = $file['event_picture'];
    $stream = $filePicture->getStream();

    $date_time = htmlentities($post['date'])." ".htmlentities($post['hour']);

    $event = new Model\Event;
    $event->event_title = $post['event_title'];
    $event->event = $post['event'];
    $event->event_price = $post['event_price'];
    $event->event_picture = $stream;
    $event->start_date = $date_time;
    $event->time = $post['time'];
    $event->time_between_each = $post['time_between_each'];
    $event->event_number = $post['event_number'];
    $event->event_state = $post['event_state'];
    $event->save();
       
        return $res->withStatus(302)->withHeader('Location', '/CreateEvent');
    }


}
