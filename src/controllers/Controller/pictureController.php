<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class PictureController extends Controller {

    /**
     * Return the picture
     */
    public static function get() {

        

    }

    /**
     * Create a new picture
     */
    public static function newPicture($req, $res, $id) {

        $session = parent::getSession($req);
        $sessionUser = self::getSessionUser($req);

        $post = $req->getParsedBody();

        if(self::sessionUserActive($req) &&
            empty(Model\Event::where('event_id', '=', $id)) &&
            empty(Model\User::where('user_id', '=', $sessionUser['id']))
            ){
                $picture = new Model\Picture;
                $picture->picture_title = $post['picture_title'];
                $picture->picture = $post['picture'];
                $picture->picture_desc = $post['picture_desc'];
                $picture->event_id = $id;
                $picture->user_id = $sessionUser['id'];
                $picture->save();
        }
        else{
            $session->setContents([
                'msg' => ['error']
            ]);
            return $res->withStatus(302)->withHeader('Location', '/events');
        }


        return $res->withStatus(302)->withHeader('Location', '/events');

    }

    /**
     * Block a picture
     */
    public static function blockPicture($res, $req){

        $sessionUser = self::getSessionUser($req);
        $session = self::getSession($req);
        $params = $req->getQueryParams();

        $picture = Model\Picture::where('picture_id', '=', $params['picture_id'])->get()->first(); 
        $user = $sessionUser['type'];

        if( self::sessionUserActive($req) &&
            ($user = 'employee' || $user = 'BDE') &&
            $picture->picture_state != 'blocked'
            ) {
                $picture->update(['picture_state' => 'blocked']);
        }
        else{
            $session->setContents([
                'msg' => ['error']
            ]);
            return $res->withStatus(302)->withHeader('Location', '/comments');
        }

        return $res->withStatus(302)->withHeader('Location', '/comments');

    }

     /**
    * like Pictures
    ********/
    public static function likePicture($req, $res){

        $sessionUser = self::getSessionUser($req);
        $params = $req->getQueryParams();

        $picture = Model\Picture::where('picture_id', '=', $params['picture_id'])->first(); 
        $user = $sessionUser['id'];

        if( self::sessionUserActive($req) &&
            empty(Model\Liked::where(function ($query) { 
                        $query->where('picture_id', $picture->picture_id)
                            ->where('user_id', $user);}))
            ) {
                $liked = new Model\Registered;
                $liked->picture_id=$picture->picture_id;
                $liked->user_id=$user;
                $liked->save();
        }

        return $res->withStatus(302)->withHeader('Location', '/events');
    }


}