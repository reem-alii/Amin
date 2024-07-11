<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Alarm;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

class HomeController extends Controller
{

   
    public static function getdata(Request $request)
    {   if(Auth::check())
        {
            $userId = Auth::id();
            $newState = $request->input('state');

            $user = \App\Models\User::find($userId);
            $user->state = $newState;
            $user->save();
        }
        
        $user=User::all();
        $i = 1;
        $j = 1;
        $windstorm_flag=0;
        $flood_flag=0;

        while (true) {
            $currentMinutes = date('i');

            if ($currentMinutes == '12') {
                $i++;

                if ($i > 3) {
                    $i = 1;
                }
            }

            
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
            if($prediction>=50.0) $flood_flag=1;
                
            
            $currentMinutes = date('i');

            if ($currentMinutes == '12') {
                $j++;

                if ($j > 3) {
                    $j = 1;
                }
            }

            
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
            if($prediction1>=50.0) $windstorm_flag=1;

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

            return view('home', ['predict_flood' => $prediction , 'predict_windstorm' => $prediction1]);

            
        
        }


    }
  
    public function updateUserState(Request $request)
    {
        
        $userId = Auth::id();
        $newState = $request->input('state');

        $user = \App\Models\User::find($userId);
        $user->state = $newState;
        $user->save();
        return view('home');
    
       
    }
    

}

