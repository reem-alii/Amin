<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Volunteer;
use App\Notifications\Alarm;
use Illuminate\Support\Facades\Notification;

class AdminUserController extends Controller
{

public function index() {
        $users=User::all();
        $volunteers=Volunteer::all();
        return view('adminUser',["users" => $users,'volunteers'=>$volunteers]);
}

public function destroy($UserId){
    // $post=Post::find($postId);
    // $post->delete();
    $user=User::where('id',$UserId)->delete();
    return to_route("adminUser.index");
   }


public function update() {
        User::query()->update([
          'state' => NULL ,   
        ]);
        
        return to_route("adminUser.index");
}

public function sendAlarms(){
        $user=User::all();
        $flag=0;
        if($flag==0){
                $details=[
                        //"Additional information and updates will be provided via Āmin"
                        //We received threat/danger/warninig alert
                        //If you are in the area, seek higher ground immediately. If you are at home, stay where you are. 
                        //we wish you all 
                        //stay at safe area
                        //to_route("instructions.index")
        
                        'greetning'=>'EMERGENCY ALERT❗',
                        'body'=>"A Flooding warning has been issued, flood is about to occurre. For
                                your safety, listen for instructions.If you are in the area, seek higher ground immediately.
                                If you are at home, stay where you are.
                                We will provide updates via Āmin website as we receive more information.",
        
                        'actionText'=>'Instructions to be Āmin',
                        'actionUrl'=>"/",
                        'lastLine'=>'We hope you all safe, ',
                        
                ];     
        }

        elseif($flag==1){  
        $details=[
                //"Additional information and updates will be provided via Āmin"
                //We received threat/danger/warninig alert
                //If you are in the area, seek higher ground immediately. If you are at home, stay where you are. 
                //we wish you all 
                //stay at safe area

                'greetning'=>'EMERGENCY ALERT❗',
                'body'=>"A tornado warning has been issued, windstorm  is about to occurre. For
                        your safety, listen for instructions.Stay at safe area.
                        We will provide updates via Āmin website as we receive more information.",
                'actionText'=>'Instructions to be Āmin',
                'actionUrl'=>"/",
                'lastLine'=>'We hope you all safe, ',
                
        ];
        }

        Notification::sendNow($user, new Alarm($details));
        return to_route("adminUser.index");
        // dd('done');
// $user->notify(new SendAlarm($details));
} 


}



