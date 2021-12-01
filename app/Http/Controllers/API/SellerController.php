<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SellerController extends Controller
{
    /* public function showOrders(Request $request)
    {
        $response = json_decode($request->getContent());
        $client = Client::find($response->client_id);
        $affiche = $client->cart->order;
        return $affiche;
    } */

    public function showOrders()
    {
        $orders = DB::table('orders')
            ->select('cart_id', 'status')
            ->where('status', '=', 'waiting')
            ->get();
        return $orders;
    }

    public function processOrder(Request $request)
    {
        $response = json_decode($request->getContent());
        $order = Order::find($request->id);
        if (($request->validation) == "accept") {
            $order->status = "seller_accept";
        } else if (($request->validation) == "refuse") {
            $order->status = "seller_refuse";
        } else if (($request->validation) == "ready") {
            $order->status = "seller_ready";
        } else {
            return "Pas un mot clé, s'il vous plait utilisez : accept/ready/refuse";
        }

        $order->save();
        return "Etat de la commande : " . $order->status;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Request $request, $cart)
    {
        //$myCart=
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
