<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Str::random();


class RegisterController extends Controller
{
    public function register() {
        $price = mt_rand(100000, 150000);


        return view('register', compact('price'));
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'hobbies' => 'required',
            'instagram' => 'required|url',
            'phone' => 'required|numeric',
            'photo' => 'required|image|file|max:2048',
            'wallet' => 'required',
            'nominal' => 'required',
            'password' => 'required'
        ]);

        $validate['photo'] = $request->file('photo')->store('');
        $validate['password'] = bcrypt($validate['password']);

        if($request->nominal < 100000) {
            return redirect()->back()->with('error', 'Not enough money');
        } else {
            $validate['wallet'] = $validate['nominal'] - $validate['wallet'];
            User::create($validate);
        }

        return redirect('/login')->with('registerSuccess', 'You success register');
    }

    public function show() {
        return view('login');
    }

    public function login(Request $request) {
        $validate = $request->validate([
            'name' => 'required', 
            'password' => 'required',
        ]);

        if(Auth::attempt($validate)) {

            // Buat session 
            $request->session()->regenerate(); 

            return redirect('/home');
        }

        dd('tes');
        return redirect()->back()->with('loginError', 'Login Failed!');
    }

    public function logout() {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }
}


