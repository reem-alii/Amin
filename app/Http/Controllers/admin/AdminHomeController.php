<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {  
        $result = HomeController::getdata();
        $predictFlood = $result['predict_flood'];
        $predictWindstorm = $result['predict_windstorm'];
        return view('admin.home',['predict_flood' => $predictFlood , 'predict_windstorm' => $predictWindstorm]);
    }
}
