<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class NotificationController extends Controller {

    public static function get($req, $res){

        $notif = Model\Notification::where('is-read', 0)->get(); 
        
        return self::render($res, 'Notifications', $notif);

    }

    public static function create($user_id, $title, $desc){

        if(!empty(Model\User::where('user_id', $user_id))){
            $notif = new Model\Notification;
            $notif->notif_title = $title;
            $notif->notif = $desc;
            $notif->user_id = $user_id;
            $notif->save();
        }

    }

    public static function read($req, $res, $id){

        $sessionUser = self::getSessionUser($req);
        $notif = Model\Notification::where('notif_id', $id)->get()->first(); 

        if( self::sessionUserActive($req) &&
            ($sessionUser['type'] == 'BDE') &&
            ($notif->is_read == 0)
            ) {
                $notif->update(['is_read' => 1]);
        }
        else{
            $session->setContents([
                'msg' => ['error']
            ]);
            return $res->withStatus(302)->withHeader('Location', '/Notifications');
        }

        return $res->withStatus(302)->withHeader('Location', '/Notifications');
    }





}