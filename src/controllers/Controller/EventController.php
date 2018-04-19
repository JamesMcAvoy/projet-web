<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Controllers\Controller\IdeaController as Idea;
use Controllers\Controller\PictureController as Pic;
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
     * Return a view of an event
     */
    public static function indexEvent($req, $res, $id) {

        $session = parent::getSession($req);
        $sessionContents = $session->getContents();

        if(isset($sessionContents['msg'])) {
            $msg = $sessionContents['msg'];
            unset($sessionContents['msg']);

            $session->setContents($sessionContents);
        } else $msg = null;

        if(empty(Model\Event::where('event_id', '=', $id)->get()->first()))
            return Controller\ErrorController::error404($req, $res);

        return self::render($res, 'event', [
            'route' => 'events',
            'user' => self::getSessionUser($req),
            'event' => self::get($id),
            'msg' => $msg,
            'registered' => self::isRegistered(self::getSessionUser($req)['id'], $id)
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
     * Return all events, when ID is called, return the event related
     */
    public static function get($id = null) {

        if(!isset($id))
            return Model\Event::all();
        else
            return Model\Event::where('event_id', '=', $id)->get()->first();

    }

    /**
     * Get events from current month
     */
    public static function getMonth() {

        return Model\Event::whereMonth('start_date', '=', date('n'))
                          ->orderBy('start_date', 'desc')
						  ->take(3)
                          ->get();

    }

    /**
     * Registration for an event
     */
    public static function register($req, $res, $id) {

        $session = self::getSession($req);
        $sessionUser = self::getSessionUser($req);
        $params = $req->getQueryParams();

        $event = Model\Event::where('event_id', '=', $id)->get()->first(); 
        $user = $sessionUser['id'];

        if(!self::sessionUserActive($req)) {
            $session->setContents([
                'msg' => [
                    'error' => 'Vous devez être connecté'
                ]
            ]);
            return $res->withStatus(302)->withHeader('Location', "/events/$id");
        }

        if(!empty(Model\Registered::where([
            ['event_id', '=', $event->event_id],
            ['user_id', '=', $user]
        ])->get()->first())) {
            $session->setContents([
                'user' => self::getSessionUser($req),
                'msg' => [
                    'error' => 'Vous êtes déjà inscrit'
                ]
            ]);
            return $res->withStatus(302)->withHeader('Location', "/events/$id");
        }

        $registered = new Model\Registered;
        $registered->event_id=$event->event_id;
        $registered->user_id=$user;
        $registered->save();

        $session->setContents([
            'user' => self::getSessionUser($req),
            'msg' => [
                'valid' => 'Vous vous êtes bien inscrit'
            ]
        ]);
        return $res->withStatus(302)->withHeader('Location', "/events/$id");

    }

    /**
     * Return if an user is registered for an event
     */
    private static function isRegistered($userId, $eventId) {

        return !empty(Model\Registered::where([
            ['event_id', '=', $eventId],
            ['user_id', '=', $userId]
        ])->get()->first());

    }

    public static function blockEvent($req, $res, $id){

        $sessionUser = self::getSessionUser($req);
        $session = self::getSession($req);

        $event = Model\Event::where('event_id', '=', $id)->get()->first(); 
        $user = $sessionUser['type'];

        if( self::sessionUserActive($req) &&
            ($user == 'employee' || $user == 'BDE') &&
            $event->event_state != 'blocked'
            ) {
                Model\Event::where('event_id', '=', $id)->update(['event_state' => 'blocked']);
        }
        else{
            $session->setContents([
                'msg' => ['error']
            ]);
            return $res->withStatus(302)->withHeader('Location', '/events');
        }

        return $res->withStatus(302)->withHeader('Location', '/events');

    }

    public static function liste(){
        
    }


}