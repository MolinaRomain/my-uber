<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Product::all();
    }

    public function addProduct(Request $request)
    {
        $response = json_decode($request->getContent());
        if ($response) {
            $client = Client::find($response->client_id);
            if ($client->cart_id != null) {
                $cart = Cart::find($client->cart_id);
                $cart->product()->attach($response->product_id);
                return "article ajouté";
            } else {
                // return "je n'ai pas de panier";
                $cart = new Cart();
                $cart->save();
                $client->cart_id = $cart->id;
                $client->save();
                $cart->product()->attach($response->product_id);
                return "article ajouté";
            }
        } else {
            return "erreur ajout produit";
        } 
    }

    public function addProfile(Request $request)
    {
        $response = json_decode($request->getContent());
        $client = Client::find($response->client_id);
        if ($client != null) { // update
            $client->address = $response->address;
            $client->phone = $response->phone;
            $client->save();
            return "adresse et phone mise à jour pour pour client n" . $client->id;
        } else {
            $newclient = new Client();
            $newclient->address = $response->address;
            $newclient->phone = $response->phone;
            $newclient->save();
            return "nouveau client n " . $newclient->id;
        }
        // $client = new Client();
        // $client->address = $response->address;
        // $client->phone = $response->phone;
        // $client->save();

    }

    public function validateCart(Request $request)
    {
        $response = json_decode($request->getContent());
        if ($response) {
            $client = Client::find($response->client_id);
            $cart = $client->cart;
            if ($cart != null) {
                if ($cart->order != null && $cart->order->status == 'waiting') {
                    return 'commande déjà envoyé';
                } else {
                    $order = new Order();
                    $order->cart_id = $cart->id;
                    $order->shipper_id = '1';
                    $order->status = 'waiting';
                    $order->save();
                    return 'Votre commande est envoyé, en attente de validation';
                }
            } else {
                return 'Votre panier est vide';
            }
            return $cart;
        } else {
            return 'error 404';
        }
        // seller_accept/seller_refuse/seller_ready/shipping_in_progress/shipped
    }

    public function statusOrder(Request $request)
    {
        $response = json_decode($request->getContent());
        if ($response) {
            $client = Client::find($response->client_id);
            $cart = $client->cart;
            $order = $cart->order;
            return $order->status;
        }
    }
}
