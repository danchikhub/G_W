<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    public function postShow(){
        $post = new Post;
        $posts = $post->all();
        return view('postShow')->with('posts',$posts);
    }
    public function postAdd(){
        $post = new Post;
        $posts = $post->all();
        return view('postAdd')->with('posts',$posts);
    }
    public function postAddSubmit(Request $request)
    {
        $name= $request->input('name');
        DB::insert('EXEC insert_post ? ',array($name));
        return redirect()->route('postShow');
    }
    public function postDelete($ID){
        $post = DB::delete('EXEC delete_post ?',array($ID));
        return redirect()->route('postShow');
    }
    public function postUpdate($ID){
        $posts=Post::all();
        $post=$posts->find($ID);    
        return view('postUpdate',compact('post'));
    }
    public function postUpdateSubmit($ID,Request $request){
        $name= $request->input('name');
        DB::insert('EXEC update_post ?, ? ',array($ID,$name));
        return redirect()->route('postShow');
    }
}
