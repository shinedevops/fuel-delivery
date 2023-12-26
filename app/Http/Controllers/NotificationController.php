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
        $notificationType = $request->input('notification_type');
        $status = $request->input('status');
        
        $user = auth()->user(); // Get the authenticated user
        
        $userNotification = $user->userNotification; // relation

        // If the UserNotification instance doesn't exist, create a new one
        if (!$userNotification) {
            $userNotification = new UserNotification();
            $userNotification->user_id = $user->id; 
        }

        // Update the notification status based on the notification type
        if ($notificationType === 'accept_order') {
            $userNotification->accept_order = $status;
        } elseif ($notificationType === 'subscription') {
            $userNotification->subscription = $status;
        } elseif ($notificationType === 'issue') {
            $userNotification->issu = $status;
        } 

        $userNotification->save();

        return response()->json(['success' => true]);
    }

}
