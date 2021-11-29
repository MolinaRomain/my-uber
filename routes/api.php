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
Route::get('/api/client/order', [ClientController::class, 'validationCart']);
Route::get('/api/client', [ClientController::class, 'StatusOrder']);

Route::get('/api/seller', [SellerController::class, 'ShowOrders']);
Route::put('/api/seller/{$numorder}', [SellerController::class, 'OrderTreatment']);

Route::get('/api/shipper/order', [ShipperController::class, 'ShowPastedOrder']);
Route::post('/api/shipper/', [ShipperController::class, 'ShipperTraitement']);
