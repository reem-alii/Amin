<?php

namespace App\Http\Controllers\programmer\auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgrammerLoginController extends Controller
{
    public function login()
    {
        return view('programmer.auth.login');
    }

   
    public function check(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
        if(Auth::guard('programmer')->attempt($request->only('email','password')))
        {
            return redirect()->route('programmer.home');
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
        Auth::guard('programmer')-> logout();

        return redirect()-> route('programmer.login');
    }

}
