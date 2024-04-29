<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;



class AdminLoginController extends Controller
{   

    public function login()
    {
        return view('admin.auth.login');
    }

   
    public function check(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
        if(Auth::guard('admin')->attempt($request->only('email','password')))
        {
            return redirect()->route('admin.home');
        }
        else
        {
            return redirect()->back()
                ->withInput(['email'=> $request->email])
                ->withErrors(['errorResponse' => 'These Credentials Do not Match Our Records']);
        }

    }


    public function logout()
    {
        Auth::guard('admin')-> logout();

        return redirect()-> route('admin.login');
    }


    


}
