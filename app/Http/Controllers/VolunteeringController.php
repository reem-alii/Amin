<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Volunteer;

class VolunteeringController extends Controller
{
   
    public function create(){
        return view('Volunteering');
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
