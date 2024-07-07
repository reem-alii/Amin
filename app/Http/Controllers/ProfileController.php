<?php

namespace App\Http\Controllers;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public  function index(Request $request) 
    {
        $result = HomeController::getdata($request);
        $predictFlood = $result['predict_flood'];
        $predictWindstorm = $result['predict_windstorm'];
        return view('profile',['predict_flood' => $predictFlood , 'predict_windstorm' => $predictWindstorm]);
    }
}
