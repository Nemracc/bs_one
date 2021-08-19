<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

Route::get('version', function () {
    return response()->json(['version' => config('app.version')]);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    Log::debug('User:' . serialize($request->user()));
    return $request->user();
});


Route::namespace('App\\Http\\Controllers\\API\V1')->group(function () {
    //Estas son las declaraciones tipicas de las rutas, definidas por el usuario
    Route::get('profile', 'ProfileController@profile');
    Route::put('profile', 'ProfileController@updateProfile');
    Route::post('change-password', 'ProfileController@changePassword');
    Route::get('tag/list', 'TagController@list');
    Route::get('category/list', 'CategoryController@list');
    Route::get('cliente/{id}', 'ClientesController@RecuperarCliente');
    // Route::get('documentosclientes/{id}, DocumentosClienteController@RecuperarDocumentos');
    Route::post('product/upload', 'ProductController@upload');


    //declarar de esta manera, hace que ya esten disponibles
    // de acuerdo a la peticion http, las funciones de: index, create, update,delete
    Route::apiResources([
        'user' => 'UserController',
        'product' => 'ProductController',
        'category' => 'CategoryController',
        'tag' => 'TagController',
        'permission' => 'PermissionController',
        'clientes' => 'ClientesController',
        'clientesactividades' => 'ClientesActividadesController',
        'documentosclientes' =>'DocumentosClienteController',
    ]);



});
