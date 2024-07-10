<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Volunteer;
use App\Models\Windstorm;
use App\Models\Flood;
use App\Notifications\Alarm;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client; 

class AdminUserController extends Controller
{

        protected $windstorm_data;   
        protected $flood_data;   
        protected $prediction;   
        protected $prediction1;   

public function index() {
        
        $users=User::all();
        $volunteers=Volunteer::all();
        $users_count=User::count();
        $save_count=User::where('state','=','safe')->count();
        $emergency_count=User::where('state','=','emergency')->count();
        $vols_count=Volunteer::count();

        $windstorm_data=Windstorm::all();
        $flood_data=Flood::all();

        $i = 0; // floods id
        $j = 0; //windstorm id
        $prediction1=0;
        $prediction=0;

        $windstorms_count=Windstorm::count();
        $floods_count=Flood::count();

        for($i=1;$i<=$floods_count;$i++)  {
            
            $flood = \App\Models\Flood::find($i); 
        
            $client = new Client();                  
            $data = [
                
                'JAN' => floatval($flood->JAN),
                'FEB' => floatval($flood->FEB),
                'MAR' => floatval($flood->MAR),
                'APR' => floatval($flood->APR),
                'MAY' => floatval($flood->MAY),
                'JUN' => floatval($flood->JUN),
                'JUL' => floatval($flood->JUL),
                'AUG' => floatval($flood->AUG),
                'SEP' => floatval($flood->SEP),
                'OCT' => floatval($flood->OCT),
                'NOV' => floatval($flood->NOV),
                'DEC' => floatval($flood->DECMB),
            ];


            $response = $client->request('POST', 'http://127.0.0.1:8000/predict_floods_prop', [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($data),
            ]);
        
            $prediction = json_decode($response->getBody()->getContents());

            $f_update = \App\Models\Flood::find($i);
            $f_update->flood_Pred = $prediction;
            $f_update->save();

            
            $next_date = \App\Models\Flood::find($i);
            $next_date->date=date('j/n',strtotime($next_date->date. ' + 1 month'));
            $next_date->save();
        

        }

        for( $j=1;$j<=$windstorms_count;$j++ )  {
           
            $windstorm = \App\Models\Windstorm::find($j); 
        
            $client1 = new Client();                  
            $data1 = [
                
                'temperature' => floatval($windstorm->temperature),
                'relative_humidity' => floatval($windstorm->relative_humidity),
                'pressure' => floatval($windstorm->pressure),
                'wind_direction' => floatval($windstorm->wind_direction),
                'precipitation' => floatval($windstorm->precipitation),
                'windgustspeed' => floatval($windstorm->windgustspeed),
               
            ];

            $response1 = $client1->request('POST', 'http://127.0.0.1:8000/predict_windstorm_prop', [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($data1),
            ]);
        
            $prediction1 = json_decode($response1->getBody()->getContents()); 

            $w_update = \App\Models\Windstorm::find($j);
            $w_update->windstorm_pred = $prediction1;
            $w_update->save();

            $next_date = \App\Models\Windstorm::find($j);
            $next_date->date=date('j/n',strtotime($next_date->date. ' + 1 days'));
            $next_date->save();
        }
        return view('adminUser',["users" => $users,
                                'volunteers'=>$volunteers,
                                "usersCount" => $users_count,
                                "saveCount" => $save_count,
                                "emergencyCount" => $emergency_count,
                                "volunteersCount" => $vols_count,
                                "windstorms" => $windstorm_data,
                                "floods" => $flood_data,
                                'predict_windstorm' => $prediction1,
                                'predict_flood' => $prediction,

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
        $windstorm_flag=0;
        $flood_flag=0;
        $i = 1; // floods id
        $j = 1; //windstorm id

        $windstorms_count=Windstorm::count();
        $floods_count=Flood::count();

        for(;$i<=$floods_count;$i++)  {
            
            $flood = \App\Models\Flood::find($i); 
        
            $client = new Client();                  
            $data = [
                
                'JAN' => floatval($flood->JAN),
                'FEB' => floatval($flood->FEB),
                'MAR' => floatval($flood->MAR),
                'APR' => floatval($flood->APR),
                'MAY' => floatval($flood->MAY),
                'JUN' => floatval($flood->JUN),
                'JUL' => floatval($flood->JUL),
                'AUG' => floatval($flood->AUG),
                'SEP' => floatval($flood->SEP),
                'OCT' => floatval($flood->OCT),
                'NOV' => floatval($flood->NOV),
                'DEC' => floatval($flood->DECMB),
            ];
        
            $response = $client->request('POST', 'http://127.0.0.1:8000/predict_floods_prop', [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($data),
            ]);
        
            $prediction = json_decode($response->getBody()->getContents());
            if($prediction>=50.0){
                $flood_flag=1;
            }
        }

        for(;$j<=$windstorms_count;$j++ )  {
           
            
            $windstorm = \App\Models\Windstorm::find($j); 
        
            $client1 = new Client();                  
            $data1 = [
                
                'temperature' => floatval($windstorm->temperature),
                'relative_humidity' => floatval($windstorm->relative_humidity),
                'pressure' => floatval($windstorm->pressure),
                'wind_direction' => floatval($windstorm->wind_direction),
                'precipitation' => floatval($windstorm->precipitation),
                'windgustspeed' => floatval($windstorm->windgustspeed),
               
            ];
        
            $response1 = $client1->request('POST', 'http://127.0.0.1:8000/predict_windstorm_prop', [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($data1),
            ]);
        
            $prediction1 = json_decode($response1->getBody()->getContents());
            if($prediction1>=50.0){
                $windstorm_flag=1;
            }
        }
        
    
        if($flood_flag==1 ){
                $f_details=[

                        'greeting'=>'EMERGENCY ALERT❗',
                        'body'=>"A Flooding warning has been issued, flood is about to occurre. For
                                your safety, listen for instructions.If you are in the area, seek higher ground immediately.
                                If you are at home, stay where you are.
                                We will provide updates via Āmin website as we receive more information.",
        
                        'actionText'=>'Instructions to be Āmin',
                        'actionUrl'=>"/",
                        'lastLine'=>'We hope you all safe, ',
                        
                ];
                Notification::sendNow($user, new Alarm($f_details));     
        }

        if($windstorm_flag==1 ){  
        $w_details=[

                'greeting'=>'EMERGENCY ALERT❗',
                'body'=>"A tornado warning has been issued, windstorm  is about to occurre. For
                        your safety, listen for instructions.Stay at safe area.
                        We will provide updates via Āmin website as we receive more information.",
                'actionText'=>'Instructions to be Āmin',
                'actionUrl'=>"/",
                'lastLine'=>'We hope you all safe, ',
                
        ];
        Notification::sendNow($user, new Alarm($w_details));
        }

      
        return to_route("adminUser.index");
        // return view('adminUser', ['predict_flood' => $prediction , 'predict_windstorm' => $prediction1]);

        // dd('done');
// $user->notify(new SendAlarm($details));
} 




}



