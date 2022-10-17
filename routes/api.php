<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\clientController;
use App\Http\Controllers\API\BookingController;
use App\Http\Controllers\API\TicketingController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//client/Agent information route
Route::get('/allclients', [clientController::class, 'index']);
Route::post('/store_clients', [clientController::class, 'store']);
Route::get('/editclient/{id}', [clientController::class, 'edit']);
Route::put('/updateclient/{id}', [clientController::class, 'update']);
Route::delete('/deleteclient/{id}', [clientController::class, 'destroy']);

//booking information route
Route::get('/allbooking', [BookingController::class, 'index']);
Route::post('/store_booking', [BookingController::class, 'store']);
Route::get('/editbooking/{id}', [BookingController::class, 'edit']);
Route::put('/updatebooking/{id}', [BookingController::class, 'update']);
Route::delete('/deletebooking/{id}', [BookingController::class, 'destroy']);

//ticketing information route
Route::get('/allticketing', [TicketingController::class, 'index']);
Route::post('/store_ticketing', [TicketingController::class, 'store']);
Route::get('/edit_ticketing/{id}', [TicketingController::class, 'edit']);
Route::put('/update_ticketing/{id}', [TicketingController::class, 'update']);
Route::delete('/delete_ticketing/{id}', [TicketingController::class, 'destroy']);