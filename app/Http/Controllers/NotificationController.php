<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
   public function toggleNotification(Request $request)
    {   
        $notificationType = $request->input('notificationName');
        $status = $request->input('value');
        if($status ==0){
            $status =1;
        }else{
            $status =0;
        }
        
        $user = auth()->user(); // Get the authenticated user
        
        
        $userNotification = $user->userNotifications()->firstOrNew();

        // Update the notification status based on the notification type
        if ($notificationType === 'accept_order') {
            $userNotification->accept_order = $status;
        } elseif ($notificationType === 'subscription') {
            $userNotification->subscription = $status;
        } elseif ($notificationType === 'issue') {
            $userNotification->issue = $status;
        } elseif ($notificationType === 'new_order') {
            $userNotification->new_order = $status;
        } 

        $userNotification->user_id = $user->id; // Ensure user_id is set
        // dd($userNotification);
        $userNotification->save();

        return response()->json(['success' => true]);
    }


}
