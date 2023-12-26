<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    //
    
    public function editsetting(Request $request, $id)
    {
        $user = auth()->user();
        $userDetails = $user->userDetails;

        return view('accountsetting', compact('user', 'userDetails'));
    }

    public function editprofile(Request $request, $user_id)
    {
        $user = auth()->user();
        $userDetails = null;
        $errorMessage = null;
        
        try {
            $userDetails = $user->userDetails;  // relationship

            if (!$userDetails) {
                throw new \Exception("User details not found.");
            }
        } catch (\Throwable $e) {
            $errorMessage = "No Data found";
            $userDetails = new UserDetail();
        }

        return view('accountedit', compact('user', 'userDetails', 'errorMessage'));
    }



    // Driver profile
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:14',
            'date' => 'required|date',
            'license' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get the authenticated user
        $user = auth()->user();

        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profile_pics', 'public');
            $user->profile_path = $profilePath;
        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        $user->save();


        // Create or update the UserDetails model
        $userDetails = $user->userDetails()->firstOrNew([]);

        // Update UserDetails fields
        $userDetails->phone_number = $request->input('phone');
        $userDetails->date = $request->input('date');

        // Handle file upload if present
        if ($request->hasFile('license')) {
            $licencePath = $request->file('license')->store('uploads', 'public');
            $userDetails->driving_licence = $licencePath;
        }

        // Save UserDetails changes
        $userDetails->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
