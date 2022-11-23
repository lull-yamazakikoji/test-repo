<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Follow;
use App\Post;
use App\User;

class FollowsController extends Controller
{
    //
    public function followList(){
        $following_id = Auth::user()->follows()->pluck('followed_id');
        $posts = Post::with('user')->whereIn('user_id',$following_id)->get();
        $users = User::whereIn('id',$following_id)->get();
        return view('follows.followList',['posts' => $posts,'users'=>$users]);
    }
    public function followerList(){
        $followed_id = Auth::user()->followers()->pluck('following_id');
        $posts = Post::with('user')->whereIn('user_id',$followed_id)->get();
        $users = User::whereIn('id',$followed_id)->get();
        // dd($posts);
        return view('follows.followerList',['posts' => $posts,'users'=>$users]);
    }
    public function follow($id){
        Follow::create([
            'following_id' => Auth::user()->id,
            'followed_id' => $id,
        ]);
        return back();
    }
    public function unfollow($id){
        Follow::where('following_id', Auth::user()->id)
        ->where('followed_id',$id)->delete();

        return back();
    }
}
