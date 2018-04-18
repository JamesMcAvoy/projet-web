<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class ShopController extends Controller {

    public static function index($req, $res) {

        $session = parent::getSession($req);
        $sessionContents = $session->getContents();

        if(isset($sessionContents['msg'])) {
            $msg = $sessionContents['msg'];
            unset($sessionContents['msg']);

            $session->setContents($sessionContents);
        } else $msg = null;

        return self::render($res, 'shop', [
        	'route' => 'shop',
            'msg' => $msg,
        	'user' => self::getSessionUser($req),
        	'goodies' => self::get()
        ]);

    }


    /**
     * Return all items from the shop,  when ID is called, return the item related
     */
    public static function get($id = null) {

        if(!isset($id))
            return Model\Item::all();
        else
            return Model\Item::where('item_id', '=', $id)->get()->first();

    }

    /**
     * Return items for the carousel
     */
    public static function getCarousel() {

        return Model\Item::where('item_number', '>', '0')
                         ->orderBy('orders_nbr', 'desc')
                         ->take(3)
                         ->get();

    }

    /**
     * Return an image from an item
     */
    public static function image($req, $res, $id) {

        $image = Model\Item::select('item_picture')->where('item_id', '=', $id)->get()->first();

        if(!isset($image->item_picture))
            return Controller\ErrorController::error404($req, $res);
        else {
            $stream = $res->getBody();
            $stream->write($image->item_picture);
            return $res->withBody($stream)->withHeader('Content-Type', 'image');
        }

    }

    /**
     * Add a product to the basket
     */
    public static function add($req, $res, $id) {

        $session = self::getSession($req);

        if(!self::sessionUserActive($req)) {
            $session->setContents([
                'msg' => [
                    'error' => 'Vous devez être connecté'
                ]
            ]);
            return $res->withStatus(302)->withHeader('Location', '/shop');
        }

        $item = Model\Item::where('item_id', '=', $id)->get()->first();

        if(empty($item)) {
            $session->setContents([
                'user' => self::getSessionUser($req),
                'msg' => [
                    'error' => 'Erreur'
                ]
            ]);
            return $res->withStatus(302)->withHeader('Location', '/shop');
        }

        if($item->item_number < 1) {
            $session->setContents([
                'user' => self::getSessionUser($req),
                'msg' => [
                    'error' => 'Plus de disponibilité'
                ]
            ]);
            return $res->withStatus(302)->withHeader('Location', '/shop');
        }

        $basket = Model\Basket::where('user_id', '=', $session->getContents()['user']['id'])
                             ->get()
                             ->first();

        $total = $basket->basket_price + $item->item_price;

        //If "contains" table not created
        if(empty(Model\Contain::where([
            ['item_id', '=', $item->item_id],
            ['basket_id', '=', $basket->basket_id]
        ])->get()->first())) {
            $contain = new Model\Contain;
            $contain->basket_id = $basket->basket_id;
            $contain->item_id = $item->item_id;
            $contain->save();
        }
        //else
        else {
            Model\Contain::where([
                ['item_id', '=', $item->item_id],
                ['basket_id', '=', $basket->basket_id]
            ])->increment('item_number');
        }

        //update basket
        Model\Basket::where('basket_id', '=', $basket->basket_id)->update(['basket_price' => $total]);

        $session->setContents([
            'user' => self::getSessionUser($req),
            'msg' => [
                'valid' => 'Vous avez rajouté '.$item->item_name.' à votre panier.'
            ]
        ]);
        return $res->withStatus(302)->withHeader('Location', '/shop');

    }

}
