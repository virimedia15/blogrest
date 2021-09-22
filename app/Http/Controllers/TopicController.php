<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    public function index(Request $req){
        return Topic::all();
    }
    public function get($topic){
        $result = Topic::find($topic);
        //$result = DB::table('topic')->where('topic', '=', $topic)->get();
        if($result)
            return $result;
        else
            return response()->json(['status'=>'failed'], 404);
    }
    public function create(Request $req){
        $this->validate($req, [
            'id'=>'required', 
            'tema'=>'required']);
        $datos = new Topic;
        // $datos->topic = $req->topic;
        //$datos->pass = $req->pass;
        // $datos->nombre = $req->nombre;
        // $datos->rol = $req->rol;
        // $datos->save();
        $result = $datos->fill($req->all())->save();
        if($result)
            return response()->json(['status'=>'success'], 200);
        else
            return response()->json(['status'=>'failed'], 404);
    }
    //topic id 
    //Topic nuevo campo en la tabla
    public function update(Request $req, $topic){
        $this->validate($req, [
            'tema'=>'filled']);

        $datos = Topic::find($topic);
        //$datos->pass = $req->pass;
        $result = $datos->fill($req->all())->save();
        if($result)
            return response()->json(['status'=>'success'], 200);
        else
            return response()->json(['status'=>'failed'], 404);
    }
    public function destroy($topic){
        $datos = Topic::find($topic);
        if(!$datos) return response()->json(['status'=>'failed'], 404);
        $result = $datos->delete();
        if($result)
            return response()->json(['status'=>'success'], 200);
        else
            return response()->json(['status'=>'failed'], 404);
    }


}
