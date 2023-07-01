<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $users = DB::table('api')->get();
        return response()->json([
           'date' => $users,
           'status' => 200,
           'message' => 'success'
        ],200);
    }

    // insert 
    public function store(){
        $user = DB::table('api')->insert(
            [
            'firstname' => 'Lim',
            'lastname' => 'Lin',
            'fullname' => 'Lim Lin',
            'gender' => 'Female',
            'phone' => '014567893',
            'address' => 'Kampong Cham'
            ]
        );
        return response()->json(
            [
            'date' => $user,
            'status' => 200,
            'message' => 'sucess'
           ]
        );
    }
    public function show($id){
        $user = DB::table('api')->where('id',$id)->first(); // return only one row
        return response()->json([
           'date' => $user,
           'status' => 200,
           'message' => 'success'
        ],200);
    }
    public function update($id){
        // check condition
    $affected = Db::table('api')->where('id',$id)->first();
    if(!$affected){
        return response()-> json(
            [
                'data' => null,
                'stauts' => 404,
                'message' => 'Not found'
            ]
        );
    }
    $affected = DB::table('api')
              ->where('id', $id)
              ->update(['fullname' => "Lim Sophea"]);
    return response()->json(
        [
            'data' => $affected,
            'status' => 200,
            'message' => 'success'
        ],200);
    }
    public function destory($id){
        // check when no data
    $deleted = DB::table('api')->where('id',$id)->first();
    if(!$deleted){
        return response()->json(
            [
                'data' => null,
                'stuts' => 404,
                'message' => 'Not Found'
            ]
        );
    }
    $deleted = DB::table('api')->where('id', $id)->delete();
    return response()->json(
        [
            'date' => $deleted,
            'satuts' => 200,
            'message' => 'sucess'
        ]
    );
    }
}


