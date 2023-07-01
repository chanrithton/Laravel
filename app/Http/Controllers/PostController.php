<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // using ORM Eloquent
    // get all records from post table
    public function index(){
        $posts = Post::all();
        return response()->json([
            'data' => $posts,
            'status' => 200,
            'message' => 'success'
        ],200);
    }

    // Create /insert
    public function store(Request $request){
        $post = Post::create($request->all());
        return response()->json([ 
            'data' => $post,
            'status' => 200,
            'message' => 'success'
        ],200);
    }

    // // show id
    // public function show($id,Request $request){

    // }

    // update  api
    public function update($id,Request $request){
      $post = Post::find($id);  // find existing post by id
      if(!$post){
          return response()->json([
            'data' => null,
            'status' => 404,
            'message' => 'post not found'
          ],404);    
       }
       $post->update($request->all());
       return response()->json([
           'data' => $post,
           'status' => 200,
           'message' => 'sucess'
       ],200);
    }

    // delete api
    public function destory($id,Request $request){
        $post = Post::find($id);  //find existing post by id
        if(!$post){
            return response()->json([
              'data' => null,
              'status' => 404,
              'message' => 'post not found'
            ],404);    
         }
         $post->delete($request->all());
         return response()->json([
             'data' => $post,
             'status' => 200,
             'message' => 'sucess'
         ],200);
    }
}
