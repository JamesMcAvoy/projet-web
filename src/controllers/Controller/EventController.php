<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Controllers\Controller\IdeaController as Idea;
use Models\Model;

final class EventController extends Controller {

    public static function index($req, $res) {

        $session = parent::getSession($req);
        $sessionContents = $session->getContents();

        if(isset($sessionContents['msg'])) {
            $msg = $sessionContents['msg'];
            unset($sessionContents['msg']);

            $session->setContents($sessionContents);
        } else $msg = null;

        return self::render($res, 'events', [
            'route' => 'events',
            'user' => self::getSessionUser($req),
            'msg' => $msg,
            'ideas' => Idea::get(),
            'events' => self::get()
        ]);

    }

    /**
     * Return the picture from an event
     */
    public static function image($req, $res, $id) {

        $image = Model\Event::select('event_picture')->where('event_id', '=', $id)->get()->first();

        if(!isset($image->event_picture))
            return Controller\ErrorController::error404($req, $res);
        else {
            $stream = $res->getBody();
            $stream->write($image->event_picture);
            return $res->withBody($stream)->withHeader('Content-Type', 'image');
        }

    }

    /**
     * Return all events
     */
    public static function get(){

        return Model\Event::all();

    }

    public static function eventMonth($req, $res){
        $date = time() - (21*24*60*60);
        $event = Event::where('event_state', '=', 'up' && 'start_date', '>', $date->format('U = Y-m-d H:i:s'));
        return self::render($res,'events',$event);
    }


    /**
    * Creation
    ********/   
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


    /**
    * Registration
    ********/
    public static function eventRegistration($req, $res){

        $sessionUser = self::getSessionUser($req);
        $params = $req->getQueryParams();

        $event = Model\Event::where('event_id', '=', $params['event_id'])->first(); 
        $user = $sessionUser['id'];

        if( self::sessionUserActive($req) &&
        empty(Model\Registered::where(function ($query) { 
            $query->where('event_id', '=', $event->event_id)
                ->where('user_id', $user);}))
            ) {
                $registered = new Model\Registered;
                $registered->event_id=$event->event_id;
                $registered->user_id=$user;
                $registered->save();
        }

        return $res->withStatus(302)->withHeader('Location', '/events');
    }

    /**
    * Manage
    ********/
    /* faudrait auto compléter le forms avec les infos de la BDD sur l'évenement
    $post = $req->getParsedBody(); 
    $event = Model\Event::where('item_id', '=', $post['item_id'])->get()->first();
    return self::render($res,'ManageEvent',$event);*/

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

/*
Events of month appareant for all
visitors : events appearant for all visitors
+ BDE : edit events with : description, picture, dated, price, recurrence; access list registered : PDF, CSV.
+ for connected : registration of un event
+ employees : block event (notif BDE)
*/

}