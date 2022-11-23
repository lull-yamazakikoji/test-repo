<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function userUpdate(Request $request){
        $upName = $request->input('upName');
        $upMail = $request->input('upMail');
        $upPass = $request->input('upPass');
        $upBio = $request->input('upBio');
        $upFile = $request->file('upFile')->store('', 'public');

        User::where('id',Auth::user()->id)
        ->update([
            'username' => $upName,
            'mail' => $upMail,
            'password' => bcrypt($upPass),
            'bio' => $upBio,
            'images' => $upFile,
        ]);
        return redirect('/top');
    }

    public function search(){
        $users = User::where('id','!=', Auth::user()->id)->get();
        return view('users.search',['users' => $users]);
    }
    public function userSearch(Request $request){
        $searchWord = $request->input('searchWord');
        // dd($searchWord);
        if(!empty($searchWord)){
            $users = User::where('username','like','%'.$searchWord.'%')->where('id','!=',Auth::user()->id)->get();
        }else{
            $users = User::where('id', '!=' , Auth::user()->id)->get();
        }
        return view('users.search',['searchWord'=> $searchWord,'users'=>$users]);
    }
}
