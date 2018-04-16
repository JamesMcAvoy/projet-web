<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class EventRegistrationController extends Controller {

    public static function index($req, $res) {

        return self::render($res, 'events');

    }

    public static function eventRegistration($req, $res){

        $sessionUser = self::getSessionUser($req);
        $params = $req->getQueryParams();

        $event = Model\Event::where('event_id', '=', $params['event_id'])->first(); 
        $user = $sessionUser['id'];

        if( self::sessionUserActive($req) &&
            empty(Model\Registered::where('event_id', '=', $event->event_id)) &&
            empty(Model\Registered::where('user_id', '=', $user))
            ) {
                $registered = new Model\Registered;
                $registered->event_id=$event->event_id;
                $registered->user_id=$user;
                $registered->save();
        }

        return $res->withStatus(302)->withHeader('Location', '/events');
    }

}

?>