<?php

namespace App\Http\Controllers;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstructionsController extends Controller
{
    public  function index(Request $request) 
    {
        $result = HomeController::getdata($request);
        $predictFlood = $result['predict_flood'];
        $predictWindstorm = $result['predict_windstorm'];
        return view('instructions',['predict_flood' => $predictFlood , 'predict_windstorm' => $predictWindstorm]);
    }
}
