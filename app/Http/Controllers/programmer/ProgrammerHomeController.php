<?php

namespace App\Http\Controllers\programmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgrammerHomeController extends Controller
{
    public function index()
    {
        return view('programmer.home');
    }
}
