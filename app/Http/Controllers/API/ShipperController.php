<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShipperController extends Controller
{

    public function showOrders()
    {
        $orders = Order::where('status', '=', 'seller_ready')->get();
        return $orders;
    }

    public function processOrder(Request $request)
    {

        $response = json_decode($request->getContent());
        $order = Order::find($request->id);
        if (($request->validation) == "accept") {
            $order->status = "shipping_accepted";
        } else if (($request->validation) == "refuse") {
            $order->status = "seller_ready";
        } else if (($request->validation) == "shipped") {
            $order->status = "shipped";
        } else {
            return "Pas un mot clé, s'il vous plait utilisez : accept/shipped/refuse";
        }

        $order->save();
        return "Etat du livreur " . $order->status;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
