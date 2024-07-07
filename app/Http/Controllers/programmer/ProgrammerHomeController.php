<?php

namespace App\Http\Controllers\programmer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

class ProgrammerHomeController extends Controller
{
    public function index()
    {   
        $result = HomeController::getdata();
        $predictFlood = $result['predict_flood'];
        $predictWindstorm = $result['predict_windstorm'];
        return view('programmer.home',['predict_flood' => $predictFlood , 'predict_windstorm' => $predictWindstorm]);
    }
}
