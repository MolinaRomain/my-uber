<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ClientController;
use App\Models\Client;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('client/product/{$cart}', [ClientController::class, 'addProduct']);
Route::put('client/profile/{$cart}', [ClientController::class, 'addProfile']);
Route::get('/api/client/order{$cart}', [ClientController::class, 'validateCart']);
Route::get('/api/client/{$cart}', [ClientController::class, 'statusOrder']);

Route::get('/api/seller', [SellerController::class, 'showOrders']);
Route::put('/api/seller/{$idorder}', [SellerController::class, 'makeOrder']);

Route::get('/api/shipper/ready', [ShipperController::class, 'readyToShip']);
Route::post('/api/shipper/{$idorder}', [ShipperController::class, 'sendOrder']);
