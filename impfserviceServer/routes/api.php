<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VaceventController;
use App\Http\Controllers\VaclocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('vaccinationevents', [VaceventController::class, 'index']);
//für die Ausgabe der Impftermine in der Übersicht je Bundesland
Route::get('vaccinationevents/{state}', [VaceventController::class, 'findByState']);
//für die Detailausgabe jedes Impftermins
Route::get('vaccinationevent/{id}', [VaceventController::class, 'findDetailsByID']);
//für die Darstellung der zur Verfügung stehenden Locations beim Anlegen eines neuen Termins
Route::get('vaccinationlocations/{state}', [VaclocationController::class, 'getLocationsByState']);
//für die Übergabe der genauen Locationdaten beim Editieren oder Neuanlegen eines Termins
Route::get('vaccinationlocation/{id}', [VaclocationController::class, 'getLocationsById']);


//authenticate
Route::post('auth/login', [AuthController::class, 'login']);

Route::group(['middleware'=>['api', 'auth.jwt']], function (){
    //für das Auslesen der User-Daten im Zuge der Buchung eines Termins
    Route::get('vaccinationevents/registration/{id}', [UserController::class, 'getUser']);
    //für das Neuanlegen eines Impftermins
    Route::post('vaccinationevent', [VaceventController::class, 'save']);
    //für das Editieren eines bestehenden Impftermins
    Route::put('vaccinationevent/{id}', [VaceventController::class, 'update']);
    //für das Löschen eines bestehenden Impftermins
    Route::delete('vaccinationevent/{id}', [VaceventController::class, 'delete']);
    //für das Updaten der Buchung eines Termins für einen User
    Route::put('vaccinationevents/registration/{id}', [UserController::class, 'update']);
    Route::post('auth/logout', [AuthController::class, 'logout']);
});
