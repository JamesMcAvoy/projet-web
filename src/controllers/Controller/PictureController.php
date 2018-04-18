<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class PictureController extends Controller {

    /**
     * Return the picture
     */
    public static function image($req, $res, $id) {

        $image = Model\Picture::select('picture')->where('picture_id', '=', $id)->get()->first();

        if(!isset($image->picture))
            return Controller\ErrorController::error404($req, $res);
        else {
            $stream = $res->getBody();
            $stream->write($image->picture);
            return $res->withBody($stream)->withHeader('Content-Type', 'image');
        }

    }

    /**
     * Create a new picture
     */
    public static function newPicture($req, $res, $id) {

        $session = parent::getSession($req);
        $sessionUser = self::getSessionUser($req);

        $post = $req->getParsedBody();

        //If active session
        //and event exist
        //and user exist
        if(self::sessionUserActive($req) &&
            !empty(Model\Event::where('event_id', '=', $id)) &&
            !empty(Model\User::where('user_id', '=', $sessionUser['id']))
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
            ($user == 'employee' || $user == 'BDE') &&
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
     * like Picture
     * Ajax
     */
    public static function like($req, $res, $id) {


        $pic = Model\Picture::where('picture_id', '=', $id)->get()->first();

        if(empty($pic) || !self::sessionUserActive($req))
            return $res->withStatus(400);

        $userId = self::getSessionUser($req)['id'];

        $liked = Model\Liked::where([
            ['picture_id', '=', $id],
            ['user_id', '=', $userId]
        ])->get()->first();

        if(!empty($liked))
            return $res->withStatus(400);

        $liked = new Model\Liked;
        $liked->picture_id=$id;
        $liked->user_id=$userId;
        $liked->save();

        Model\Picture::where('picture_id', '=', $id)->increment('picture_number_like');

        return $res->withStatus(200);

    }


}