<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class commentsController extends Controller {

    /**
     * Return the comment
     */
    public static function get() {

        

    }

    /**
     * Create a new comment
     */
    public static function createComment($req, $res, $id) {

        $session = parent::getSession($req);
        $sessionUser = self::getSessionUser($req);

        $post = $req->getParsedBody();

        if(self::sessionUserActive($req) &&
            empty(Model\Picture::where(function ($query) { 
                $query->where('picture_id', $id)
                    ->where('user_id', $sessionUser['id']);}))
            ){
                $comment = new Model\Comment;
                $comment->comment = $post['comment'];
                $comment->user_id = $sessionUser['id'];
                $comment->picture_id = $id;
                $comment->save();
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
     * Block a comment
     */
    public static function blockComment($res, $req){

        $sessionUser = self::getSessionUser($req);
        $session = self::getSession($req);
        $params = $req->getQueryParams();

        $comment = Model\Comment::where('comment_id', '=', $params['comment_id'])->get()->first(); 
        $user = $sessionUser['type'];

        if( self::sessionUserActive($req) &&
            ($user = 'employee' || $user = 'BDE') &&
            $comment->comment_state != 'blocked'
            ) {
                $comment->update(['comment_state' => 'blocked']);
        }
        else{
            $session->setContents([
                'msg' => ['error']
            ]);
            return $res->withStatus(302)->withHeader('Location', '/comments');
        }

        return $res->withStatus(302)->withHeader('Location', '/comments');

    }

}