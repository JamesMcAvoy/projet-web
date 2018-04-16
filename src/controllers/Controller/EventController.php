<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class EventController extends Controller {

    public static function index($req, $res) {

        $session = parent::getSession($req);
        $sessionContents = $session->getContents();

        if(isset($sessionContents['msg'])) {
            $msg = $sessionContents['msg'];
            unset($sessionContents['msg']);
            $session->setContents($sessionContents);
            return self::render($res, 'login', ['msg' => $msg]);
        }

        return self::render($res, 'events', ['route' => 'events', 'user' => self::getSessionUser($req)]);

    }

    public static function addIdea($req, $res) {

        $session = parent::getSession($req);
        $sessionUser = self::getSessionUser($req);

        $post = $req->getParsedBody();

        $errors = [];

        if(strlen($post['idea_title']) < 3) {
            $errors[] = "Le titre est trop court.";
        }
        if(strlen($post['idea']) < 5) {
            $errors[] = "La description est trop courte.";
        }

        //If errors
        if(!empty($errors)) {
            $session->setContents([
                'msg' => [
                    'error' => $errors
                ]
            ]);
            return $res->withStatus(302)->withHeader('Location', '/events');
        }
 
        $idea = new Model\Idea;
        $idea->idea_title = htmlentities($post['idea_title']);
        $idea->idea = htmlentities($post['idea']);
        $idea->user_id = $sessionUser['id'];
        $idea->save();

        $session->setContents([
            'msg' => [
                'valid' => 'Vous avez posté bien une idée d\'événement. Elle est désormais visible à tous et en attente de votes.'
            ]
        ]);

        return $res->withStatus(302)->withHeader('Location', '/events');

    }

}