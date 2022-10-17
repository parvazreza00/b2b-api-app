<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\clientController;
use App\Http\Controllers\API\BookingController;
use App\Http\Controllers\API\TicketingController;
use App\Http\Controllers\API\Deposit_requestController;
use App\Http\Controllers\API\Search_historyController;
use App\Http\Controllers\API\ActivityLogController;
use App\Http\Controllers\API\Client_ledgerController;
use App\Http\Controllers\API\PassengerController;
use App\Http\Controllers\API\GroupFareController;

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

//deposit_request information route
Route::get('/alldeposit_request', [Deposit_requestController::class, 'index']);
Route::post('/store_deposit_request', [Deposit_requestController::class, 'store']);
Route::get('/edit_deposit_request/{id}', [Deposit_requestController::class, 'edit']);
Route::put('/update_deposit_request/{id}', [Deposit_requestController::class, 'update']);
Route::delete('/delete_deposit_request/{id}', [Deposit_requestController::class, 'destroy']);

//search_history information route
Route::get('/allsearch_history', [Search_historyController::class, 'index']);
Route::post('/store_search_history', [Search_historyController::class, 'store']);
Route::get('/edit_search_history/{id}', [Search_historyController::class, 'edit']);
Route::put('/update_search_history/{id}', [Search_historyController::class, 'update']);
Route::delete('/delete_search_history/{id}', [Search_historyController::class, 'destroy']);

//activityLog information route
Route::get('/allactivityLog', [ActivityLogController::class, 'index']);
Route::post('/store_activityLog', [ActivityLogController::class, 'store']);
Route::get('/edit_activityLog/{id}', [ActivityLogController::class, 'edit']);
Route::put('/update_activityLog/{id}', [ActivityLogController::class, 'update']);
Route::delete('/delete_activityLog/{id}', [ActivityLogController::class, 'destroy']);

//client_ledger information route
Route::get('/allclient_ledger', [Client_ledgerController::class, 'index']);
Route::post('/store_client_ledger', [Client_ledgerController::class, 'store']);
Route::get('/edit_client_ledger/{id}', [Client_ledgerController::class, 'edit']);
Route::put('/update_client_ledger/{id}', [Client_ledgerController::class, 'update']);
Route::delete('/delete_client_ledger/{id}', [Client_ledgerController::class, 'destroy']);

//passenger information route
Route::get('/allpassenger', [PassengerController::class, 'index']);
Route::post('/store_passenger', [PassengerController::class, 'store']);
Route::get('/edit_passenger/{id}', [PassengerController::class, 'edit']);
Route::put('/update_passenger/{id}', [PassengerController::class, 'update']);
Route::delete('/delete_passenger/{id}', [PassengerController::class, 'destroy']);

//GroupFare information route
Route::get('/allGroupFare', [GroupFareController::class, 'index']);
Route::post('/storeGroupFare', [GroupFareController::class, 'store']);
Route::get('/editGroupFare/{id}', [GroupFareController::class, 'edit']);
Route::put('/updateGroupFare/{id}', [GroupFareController::class, 'update']);
Route::delete('/deleteGroupFare/{id}', [GroupFareController::class, 'destroy']);