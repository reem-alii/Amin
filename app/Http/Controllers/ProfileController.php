<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $result = HomeController::getdata($request);
        $predictFlood = $result['predict_flood'];
        $predictWindstorm = $result['predict_windstorm'];
        return view('profile', compact('user'),['predict_flood' => $predictFlood , 'predict_windstorm' => $predictWindstorm]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request['image_path'] = $this->upload('image');
        $user->update($request->all());
        return view('home');
    }
    public function upload(
        $requestUserImage = null,
        $disk = 'public'
    ) {
        $path = null;
        if (request()->hasFile($requestUserImage) && request()->file($requestUserImage)->isValid()) {
            $path = 'storage/' . request()->file($requestUserImage)->store('images', $disk);
        }
        return $path;
    }
    
}