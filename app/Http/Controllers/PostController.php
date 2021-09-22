<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    //FUNCION CONSULTAR 
    public function index(Request $req){
        return Post::all();
    }
    //FUNCION DE CONSULTAR POR CAMPOS
    public function get($post){
        $result = Post::find($post);
        //$result = DB::table('post')->where('post', '=', $post)->get();
        if($result)
            return $result;
        else
            return response()->json(['status'=>'failed'], 404);
    }
    //FUNCION PARA CREAR UN NUEVO
    public function create(Request $req){
        $this->validate($req, [
            'id'=>'required',
            'user'=>'required',
            'topics_id'=>'required']);

        $datos = new Post;
        $result = $datos->fill($req->all())->save();
        if($result)
            return response()->json(['status'=>'success'], 200);
        else
            return response()->json(['status'=>'failed'], 404);
    }
     //Post actualizar campo
     public function update(Request $req, $post){
        $this->validate($req, [
            //'id'=>'filled',
            'user'=>'filled']);
            //'topics_id'=>'filled']);

        $datos = Post::find($post);
        //$datos->pass = $req->pass;
        $result = $datos->fill($req->all())->save();
        if($result)
            return response()->json(['status'=>'success'], 200);
        else
            return response()->json(['status'=>'failed'], 404);
    }
    public function destroy($post){
        $datos = Post::find($post);
        if(!$datos) return response()->json(['status'=>'failed'], 404);
        $result = $datos->delete();
        if($result)
            return response()->json(['status'=>'success'], 200);
        else
            return response()->json(['status'=>'failed'], 404);
    }

}
