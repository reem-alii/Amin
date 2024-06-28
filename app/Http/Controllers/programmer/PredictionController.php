<?php

namespace App\Http\Controllers\programmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class PredictionController extends Controller
{
    public function getPrediction(Request $request)
    {
        $client = new Client();                  
        $data = [
            //'YEAR' => 1901,
            'JAN' => floatval($request->input('jan')),
            'FEB' => floatval($request->input('FEB')),
            'MAR' => floatval($request->input('MAR')),
            'APR' => floatval($request->input('APR')),
            'MAY' => floatval($request->input('MAY')),
            'JUN' => floatval($request->input('JUN')),
            'JUL' => floatval($request->input('JUL')),
            'AUG' => floatval($request->input('AUG')),
            'SEP' => floatval($request->input('SEP')),
            'OCT' => floatval($request->input('OCT')),
            'NOV' => floatval($request->input('NOV')),
            'DEC' => floatval($request->input('DEC')),
        ];

        $response = $client->request('POST', 'http://127.0.0.1:8000/predict_floods', [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($data),
        ]);

        $prediction = json_decode($response->getBody()->getContents());

        return view('programmer.prediction', ['predict_floods' => $prediction]);
    }


    public function getWindstormPrediction(Request $request)
    {
        $client = new Client();                  
        $data = [
            'temperature' => floatval($request->input('temperature')),
            'relative_humidity' => floatval($request->input('relativeHumidity')),
            'pressure' => floatval($request->input('pressure')),
            'wind_direction' => floatval($request->input('windDirection')),
            'precipitation' => floatval($request->input('precipitattion')),
            'windgustspeed' => floatval($request->input('windgustspeed')),

        ];

        $response = $client->request('POST', 'http://127.0.0.1:8000/predict_windstorm', [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($data),
        ]);

        $prediction = json_decode($response->getBody()->getContents());

        return view('programmer.windstorm', ['predict_windstorm' => $prediction]);
    }
    
}
