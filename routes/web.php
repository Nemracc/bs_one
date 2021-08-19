<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\Attributes\Node\Attributes;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('home', function () {
    return redirect('/dashboard');
});



//****************************************************************************************
//Test de luis
//****************************************************************************************
Route::group(['middleware'=>'auth'],  function(){

    //Route::resource('permissions', App\Http\Controllers\PermissionController::class);

    // esto es habilitando el
    //protected $namespace = 'App\\Http\\Controllers';
    // Route::post('permissions/insertar', 'PermissionController@insertar');

    //Esta forma es sin habilitar
    //protected $namespace = 'App\\Http\\Controllers';
    //en RouteServiceProvider
    //Route::post('/permissions/insertar', [App\Http\Controllers\PermissionController::class, 'insertar']);


});

//****************************************************************************************

Route::get('/{vue_capture?}', function () {
   return view('home');
})->where('vue_capture', '[\/\w\.-]*')->middleware('auth');



