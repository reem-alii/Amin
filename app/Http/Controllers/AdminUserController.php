<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Volunteer;
use App\Models\Windstorm;
use App\Models\Flood;
use App\Notifications\Alarm;
use Illuminate\Support\Facades\Notification;

class AdminUserController extends Controller
{

public function index() {
        $users=User::all();
        $volunteers=Volunteer::all();
        $users_count=User::count();
        $save_count=User::where('state','=','1')->count();
        $emergency_count=User::where('state','=','0')->count();
        $vols_count=Volunteer::count();

        $windstorm_data=Windstorm::all();
        $flood_data=Flood::all();

        return view('adminUser',["users" => $users,
                                'volunteers'=>$volunteers,
                                "usersCount" => $users_count,
                                "saveCount" => $save_count,
                                "emergencyCount" => $emergency_count,
                                "volunteersCount" => $vols_count,
                                "windstorms" => $windstorm_data,
                                "floods" => $flood_data,

                                ]);
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
        
                        'greeting'=>'EMERGENCY ALERT❗',
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

                'greeting'=>'EMERGENCY ALERT❗',
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



