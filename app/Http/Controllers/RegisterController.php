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
        $price = 100000;


        return view('register', compact('price'));
    }

    // public function store(Request $request) {
    //     $validate = $request->validate([
    //         'gender' => 'required',
    //         'hobbies' => 'required',
    //         'instagram' => 'required',
    //         'phone' => 'required',
    //         'photo' => 'required|image|file',
    //         'password' => 'required'
    //     ]);

    //     $validate['photo'] = $request->file('photo')->store('hobby');
    //     $validate['password'] = bcrypt($validate['password']);
    //     User::create($validate);

    //     return redirect('/login')->with('registerSuccess', 'You success register');
    // }

    public function store(Request $request) {
        $validate = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'hobbies' => 'required',
            'instagram' => 'required',
            'phone' => 'required|regex:/^[0-9]+$/',
            'photo' => 'required|image|file',
            'wallet' => 'required',
            'nominal' => 'required',
            'password' => 'required'
        ]);

        $validate['photo'] = $request->file('photo')->store('hobbies');
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


