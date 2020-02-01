<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        return Post::get();
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->post(),[
            'titulo' => 'required',
            'descricao' => 'required'
        ]);

        if($validator->fails()){
            return response($validator->messages(),400);
        }

        $post = new Post;
        $post->titulo = $request->titulo;
        $post->descricao = $request->descricao;

        $post->save();

        return response($post,201);

    }

    public function update($postId,Request $request){
        
        $validator = Validator::make($request->post(),[
            'titulo' => 'required',
            'descricao' => 'required'
        ]);

        if($validator->fails()){
            return response($validator->messages(),400);
        }

        $post = Post::where('id',$postId)->first();

        if(!$post) return response("Post não localizado",400);

        $post->titulo = $request->titulo;
        $post->descricao = $request->descricao;

        $post->save();

        return response($post,200);


    }

    public function delete($postId){

        $post = Post::where('id',$postId)->delete();

        return response("Deletado com sucesso",200);


    }
    

}
