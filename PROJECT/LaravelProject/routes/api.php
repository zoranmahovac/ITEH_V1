<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgencijaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AranzmanController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ChatGptController;
use App\Http\Controllers\BrosuraController;
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





// NEULOGOVANI USER

//NEULOGOVANI KORISNIK SME DA VIDI SAMO AGENCIJE KOJE VRSE USLUGE
//mozda mi je najbolje da admin moze da azurira sve agencije i da ih cuva


Route::resource('/agencije', AgencijaController::class); //resource ruta svih agencija koje usluzuju
Route::get('agencija/{id}', [AgencijaController::class,'show']); // resource ruta neke agencije

//vrati bukvalno sve aranzmane
Route::get('/aranzmani',[AranzmanController::class,'indexAll']);
Route::get('/brosure',[BrosuraController::class,'index']);


//0. login and register rute za usera i admina
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

//Route::get('api/aranzmani',[AranzmanController::class, 'get_paginated']);


Route::post('sacuvaj_agenciju', [AgencijaController::class, 'store']);
Route::put('azuriraj_agenciju/{id}', [AgencijaController::class, 'update']);
Route::delete('obrisi_agenciju/{id}', [AgencijaController::class, 'destroy']);

//ADMIN
Route::group(['middleware'=>['auth:sanctum', 'admin']], function () {

//hocu da samo admin sme da vidi sve usere
Route::resource('/users', UserController::class); //resource ruta svih usera koje usluzuju

Route::get('user/{id}', [UserController::class, 'show']); // resource ruta nekog usera
//azuriranje i cuvanje agencija sme da vrsi samo admin
//Route::put('azuriraj_agenciju/{id}', [AgencijaController::class, 'update']);
//Route::post('sacuvaj_agenciju', [AgencijaController::class, 'store']);
//npr neka admin brise agenciju ovde takodje 
});




Route::group(['middleware' => ['auth:sanctum']], function () {

    //1. profil usera
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    //2. vraca aranzmane samo ulogovanog usera
    Route::get('moji_aranzmani',[AranzmanController::class,'index']); //redirect na login putanju neulogovanog usera!! 
    
    //3. mogucnost zakazivanja novog aranzmana
   Route::post('aranzmani', [AranzmanController::class, 'store']);

    //4. logout usera
    Route::post('/logout', [AuthController::class, 'logout']);

    //fali mi destroy necega...
    });