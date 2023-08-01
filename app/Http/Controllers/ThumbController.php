<?php

namespace App\Http\Controllers;

use App\Models\Thumb;
use Illuminate\Http\Request;

class ThumbController extends Controller
{
    public function thumb(Request $request) {

        if(!auth()->check()) {
            return view('register')->with('message', 'You has not registered!');
        }

        // $gender = $request->randomGender;
        $user1 = auth()->user()->id;
        $user2 = $request->randomID;

        $thumb = Thumb::where('user1_id', $user1)->where('user2_id', $user2)->first();

        // Kalau belum ada datanya
        if(!$thumb) {
            Thumb::create([
                'user1_id' => $user1,
                'user2_id' => $user2,
                'user1_status' => "Thumb",
                'user2_status' => "Waiting"
            ]);
        } 

        // Kalau ada datanya
        if ($thumb !== null && $thumb->user1_status != "Thumb") {
            $thumb->user1_status = "Thumb";
            $thumb->user2_status = "Thumb";

            $thumb->save();
        } 
        
        return redirect('/home')->with('match', 'Success!');;
    }
}
