<?php

namespace Controllers\Controller;

use Controllers\Controller;
use Models\Model;

final class ShopController extends Controller {

    public static function index($req, $res) {

        return self::render($res, 'shop', [
        	'route' => 'shop',
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

}

/*
Visiteur : peux voir les produits proposés
- 3 articles les plus commandés
- filtre...
Connecté : 
- peux faire un panier avec les différents éléments à commander. 
- si panier pas validé il le garde tel qu'il l'a laissé et le retrouve lors de sa prochaine connection
- si validé : le panier est mis dans Orders, le BDE est notifié
BDE :
- administration produits : ajout, suppression, modification (nom, description, prix, catégorie)
- Création, suppression, modification des catégories.
Autre:
- préparer terrain : paypal.
*/