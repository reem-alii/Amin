<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class AdminDashboardController extends Controller
{
    public function index()
    {
        return view("admin.AdminDashboard");
    }

    public function sendPushNotificationToAllUsers()
    {
        $users = User::all(); 
        $message = 'EMERGENCY ALERT❗'; 

        foreach ($users as $user) 
        {
            //OneSignal::sendNotificationToUser($message, $user->onesignal_player_id);
        }
    }







}
