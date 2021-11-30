<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SellerController extends Controller
{
    public function showOrders(Request $request)
    {
        $response = json_decode($request->getContent());
        $client = Client::find($response->client_id);
        $affiche = $client->cart->order;
        return $affiche;
    }

    // public function showOrders()
    // {
    //     $orders = DB::table('orders')
    //         ->select('cart_id', 'status')
    //         ->get();
    //     return $orders;
    // }

    public function makeOrder()
    {
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
