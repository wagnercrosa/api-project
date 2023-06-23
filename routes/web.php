<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CotacaoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(array('prefix' => 'api/v1/'), function()
{

    Route::get('/', function () {
        return response()->json(['message' => 'API Calcular Envios', 'status' => 'Inicializado']);
    });

    Route::resource('cotacao', 'CotacaoController');
});
