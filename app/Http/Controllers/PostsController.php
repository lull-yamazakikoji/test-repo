<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = Post::with('user')->get();
        return view('posts.index',['posts' => $posts]);
    }
    public function postCreate(Request $request){
        $post = $request->input('newPost');
        $id = Auth::user()->id;

        Post::create([
            'user_id' => $id,
            'post' => $post,
        ]);
        return redirect('/top');
    }
    public function postEdit(Request $request){
        $upPost = $request->input('upPost');
        $id = $request->input('id');

        Post::where('id',$id)->update([
            'post' => $upPost,
        ]);
        return back();
    }
    public function postDelete($id){
        Post::where('id',$id)->delete();
        return back();
    }
}
