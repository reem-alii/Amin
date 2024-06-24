<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public  function index() {
        $user = auth()->user();
        return view('profile',compact('user'));    
    }

    public function update(Request $request,$id) {
        $user = User::find($id);
        $user->update($request->all());
        return view('home');
    }
    public function upload(
        $requestUserImage = null,
        $disk = 'public'
    ){
        $path = null;
        if (request()->hasFile($requestUserImage) && request()->file($requestUserImage)->isValid()){
            $path = 'storage/' . request()->file($requestUserImage)->store('images', $disk);
        }
        return $path ;
    }
}