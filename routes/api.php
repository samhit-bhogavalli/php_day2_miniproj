<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{id}', function ($id) {
    $result = DB::table('user')->where('id','=',$id)->get();
    if (count($result) == 0) {
        return "user not present";
    }
    else {
        return $result[0];
    }
});

Route::post('/users', [UserController::class, 'create']);

Route::delete('/users/{id}/delete', [UserController::class, 'destroy']);
