<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $auth = auth()->user();
        $users = User::where('id', '!=', $auth->id)->get();
        

        return view('home', compact('users', 'auth'));
    }
}
