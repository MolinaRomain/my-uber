<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SellerController extends Controller
{
    // public function showOrders(Request $request)
    // {
    //     $response = json_decode($request->getContent());
    //     $client = Client::find($response->client_id);
    //     $affiche = $client->cart->order;
    //     return $affiche;
    // }

    public function showOrders()
    {
        $orders = DB::table('orders')
            ->select('cart_id', 'status')
            ->get();
        return $orders;
    }

    //paramètre order_id dans json
    public function makeOrder(Request $request)
    {
        $response = json_decode($request->getContent());
        $order = Order::find($response->order_id);
        if($order->status === 'waiting'){
            $order->status = 'seller_acccept';
            $order->save();
            return 'Order n '.$response->order_id . ' goes to seller_accept';
        }elseif ($order->status === 'seller_acccept') {
            $order->status = 'shipping_in_progress';
            $order->save();
            return 'Order n '.$response->order_id . ' shipping in progress';
        }elseif($order->status === 'shipping_in_progress'){
            $order->status = 'shipping_in_progress';
            $order->save();
            return 'Order n '.$response->order_id . ' shipped';
        }else{
            $order->status = 'refused';
            $order->save();
            return 'Order n '.$response->order_id . ' refused';
        }

    }

 

}
