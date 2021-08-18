<?php

use App\Http\Controllers\TempController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    return DB::table('user')->get();
});

Route::get('/users/{id}', function ($id) {
    $result = DB::table('user')->where('id','=',$id)->get();
    if (count($result) == 0) {
        return "user not present";
    }
    else {
        return $result[0];
    }
});

Route::post('/users', function (Request $request) {
    DB::table('user')->insert([
        ['first_name'=>$request->get('first_name'), 'last_name'=>$request->get('last_name')]
    ]);
    return "done";
});

Route::delete('/users/{id}/delete', function ($id) {
    DB::table('user')->where('id', '=', $id)->delete();
    return "done";
});

