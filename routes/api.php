<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\API\SellerController;
use App\Http\Controllers\API\ShipperController;

use App\Models\Client;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the 'api' middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('client/index', [ClientController::class, 'index']);

Route::post('client/product', [ClientController::class, 'addProduct']);
Route::post('client/profile', [ClientController::class, 'addProfile']);
Route::get('client/order', [ClientController::class, 'validateCart']);
Route::get('client', [ClientController::class, 'statusOrder']);

Route::get('seller', [SellerController::class, 'showOrders']);
Route::post('seller', [SellerController::class, 'makeOrder']);

Route::get('shipper/ready', [ShipperController::class, 'readyToShip']);
Route::post('shipper/{$idorder}', [ShipperController::class, 'sendOrder']);
