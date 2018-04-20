<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class IdeaController extends Controller {

    /**
     * Return the ideas
     */
    public static function get() {

        return Model\Idea::where('idea_state', '=', 'valid')
                         ->with('user')
                         ->orderBy('idea_number_vote', 'desc')
                         ->orderBy('post_at', 'desc')
                         ->get();

    }

    /**
     * Create a new idea
     */
    public static function create($req, $res) {

        //logged !
        if(!self::getSessionUser($req))
            return $res->withStatus(302)->withHeader('Location', '/events'); 

        $session = parent::getSession($req);
        $sessionUser = self::getSessionUser($req);

        $post = $req->getParsedBody();

        $errors = [];

        if(empty($post['idea_title']) || strlen($post['idea_title']) < 3) {
            $errors[] = "Le titre est trop court.";
        }
        if(empty($post['idea']) || strlen($post['idea']) < 5) {
            $errors[] = "La description est trop courte.";
        }

        //If errors
        if(!empty($errors)) {
            $session->setContents([
                'user' => $sessionUser,
                'msg' => [
                    'error' => $errors
                ]
            ]);
            return $res->withStatus(302)->withHeader('Location', '/events');
        }
 
        $idea = new Model\Idea;
        $idea->idea_title = $post['idea_title'];
        $idea->idea = $post['idea'];
        $idea->user_id = $sessionUser['id'];
        $idea->save();

        $session->setContents([
            'user' => $sessionUser,
            'msg' => [
                'valid' => 'Vous avez posté bien une idée d\'événement. Elle est désormais visible à tous et en attente de votes.'
            ]
        ]);

        return $res->withStatus(302)->withHeader('Location', '/events');

    }

    /**
     * Vote for an idea
     * Ajax
     */
    public static function like($req, $res, $id) {

        $userId = self::getSessionUser($req)['id'];

        $idea = Model\Idea::where('idea_id', '=', $id)->get()->first();

        if(empty($idea) || !self::sessionUserActive($req))
            return $res->withStatus(400);

        $liked = Model\Voted::where([
            ['idea_id', '=', $id],
            ['user_id', '=', $userId]
        ])->get()->first();

        if(!empty($liked))
            return $res->withStatus(400);

        $liked = new Model\Voted;
        $liked->idea_id=$id;
        $liked->user_id=$userId;
        $liked->save();

        Model\Idea::where('idea_id', '=', $id)->increment('idea_number_vote');

        return $res->withStatus(200);

    }

    /**
     * block idea only BDE and amployee
     */
    public static function blockIdea($req, $res, $id){

        $sessionUser = self::getSessionUser($req);
        $session = self::getSession($req);


        $idea = Model\Idea::where('idea_id', '=', $id)->get()->first(); 
        $user = $sessionUser['type'];

        //If BDE or empoyee : block idea
        if( self::sessionUserActive($req) &&
            ($user == 'employee' || $user == 'BDE') &&
            $idea->idea_state != 'blocked'
            ) {
                Model\Idea::where('idea_id', '=', $id)->update(['idea_state' => 'blocked']);
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
     * get idea
     */
    public static function getValidation($req, $res, $id){

        return self::render($res, 'CreateEvent', [
            'route' => 'admin',
            'user' => self::getSessionUser($req),
            'idea' => Model\Idea::where('idea_id', '=', $id)->get()->first()
        ]);

    }

    /**
     * validate idea
     */
    public static function validate($req, $res, $id){

        $session = self::getSession($req);
        
        if(!self::sessionUserActive($req)) {
            $session->setContents([
                'msg' => [
                    'error' => 'Vous devez être connecté'
                ]
            ]);
            return $res->withStatus(302)->withHeader('Location', '/profil');
        }

        //get session
        $session = parent::getSession($req)->getContents();

        //get post from form
        $post = $req->getParsedBody();       
                
        //get file from from
        $file = $req->getUploadedFiles();
        $filePicture = $file['event_picture'];
        $stream = $filePicture->getStream();
        
        //formats date from form
        $date_time = htmlentities($post['date'])." ".htmlentities($post['hour']);
        
        //create new event
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

        //delet idea, and delet voted
        Model\voted::where('idea_id', '=', $id)->delete();
        Model\Idea::where('idea_id', '=',  $id)->delete();


        return $res->withStatus(302)->withHeader('Location', '/profil/admin');

    }

}
