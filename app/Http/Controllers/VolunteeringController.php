<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use Illuminate\Http\RedirectResponse;
use App\Models\Volunteer;

class VolunteeringController extends Controller
{
   
    public function create(Request $request)
    {   
        $result = HomeController::getdata($request);
        $predictFlood = $result['predict_flood'];
        $predictWindstorm = $result['predict_windstorm'];
        return view('volunteering',['predict_flood' => $predictFlood , 'predict_windstorm' => $predictWindstorm]);
       
    }

    public function store(): RedirectResponse
    {
        request()->validate([
            'firstName' => ['required'],
            'lastName' => ['required'],
            'volunteerEmail' => ['required', 'email','exists:users,email','unique:volunteers,user_email'],
            'phoneNumber' => ['required'],
            'volunteeringType' => ['required'],
            'availability' => ['required'],
            'verifyingCheck' => ['required'],
        ]);
        Volunteer::create([
            'first_name'=> request()->firstName,
            'last_name'=> request()->lastName,
            'user_email'=> request()->volunteerEmail,
            'phone_number'=> request()->phoneNumber,
            'volunteering_type'=> request()->volunteeringType,
            'skills'=> request()->skills,
            'availability'=> request()->availability,
            'verifying_token'=> request()->verifyingCheck,

        ]);
        // The blog post is valid...
     
        return redirect('/');
    }

    public function destroy($VolunteerId){
        // $post=Post::find($postId);
        // $post->delete();
        $volunteer=Volunteer::where('id',$VolunteerId)->delete();
        return to_route("adminUser.index");
       }
    


}