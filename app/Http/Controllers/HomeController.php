<?php

namespace App\Http\Controllers;

use App\Models\Thumb;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $auth = auth()->user();
        $users = User::where('id', '!=', $auth->id)->get();
        

        return view('home', compact('users', 'auth'));
    }

    public function filter(Request $request)
    {
        $auth = auth()->user();

        if($request->gender == 'ALL') {
            $users = User::where('id', '!=', $auth->id)->get();
        } else {
            $users = User::where('id', '!=', $auth->id)->where('gender', $request->gender)->get();
        }
    
        return view('home', compact('users', 'auth'));
    }
    

    public function wishlist() {
        $user = auth()->user();

        $thumb = Thumb::where('user1_id', $user->id)->where('user1_status', 'Thumb')->where('user2_status', 'Waiting')->get();

        $arr = [];
        foreach($thumb as $c) {
            array_push($arr, $c->user2_id);
        }

        $users = User::whereIn('id', $arr)->get();

        return view('wishlist', compact('users'));
    }
    
    public function communicate() {
        $user = auth()->user();

        $thumb = Thumb::where('user1_id', $user->id)->where('user1_status', 'Thumb')->where('user2_status', 'Thumb')->get();

        $arr = [];
        foreach($thumb as $c) {
            array_push($arr, $c->user2_id);
        }

        $users = User::whereIn('id', $arr)->get();

        return view('communicate', compact('users'));
    }

}
