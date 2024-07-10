<?php

namespace App\Http\Controllers\programmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestModelController extends Controller
{
    
    public function index()
    {
        return view('programmer/TestModel');
    }
}
