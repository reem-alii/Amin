<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{


    public function getdata(Request $request)
    {   

        $i = 1;
        $j = 1;

        while (true) {
            $currentMinutes = date('i');

            if ($currentMinutes == '49') {
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

            $currentMinutes = date('i');

            if ($currentMinutes == '49') {
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
            
            return view('home', ['predict_flood' => $prediction , 'predict_windstorm' => $prediction1]);

        
        }


    }
   

}

