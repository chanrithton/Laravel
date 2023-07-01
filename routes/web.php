<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Route::get('/hello',function(){
   return 'Hello World';
});

// Connection Database
Route::get('check-db-connection',function(){
    try {
       $dbconnect = DB::connection();
        $dbname = DB::connection()->getDatabaseName();
        echo "Connected successfully to the database. Database name is :".$dbname;
    } catch(Exception $e) {
        echo "Error in connecting to the database";
    } 
});

// get data from db using query builder
Route::get('users',[UserController::class,'index']);
// insert data in api
Route::get('create-user',[UserController::class,'store']);
// get id by User
Route::get('user/{id}',[UserController::class,'show']);
// Upadate Database
Route::get('update-user/{id}',[UserController::class,'update']);

Route::get('delete-user/{id}',[UserController::class,'Destory']);