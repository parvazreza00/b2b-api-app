<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\clientController;

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

//employee information route
Route::get('/allclients', [clientController::class, 'index']);
Route::post('/store_clients', [clientController::class, 'store']);
// Route::get('/editemployee/{id}', [EmployeeController::class, 'editEmployee']);
// Route::put('/updateemployee/{id}', [EmployeeController::class, 'updateEmployee']);
// Route::delete('/deleteemployee/{id}', [EmployeeController::class, 'deleteEmployee']);
