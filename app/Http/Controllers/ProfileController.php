<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class ProfileController extends Controller
{
    //
    public function editsetting(Request $request, $id)
    {
        $user = auth()->user();
        $userDetails = $user->userDetails;
        $userNotification = $user->userNotifications;

        return view('accountsetting', compact('user', 'userDetails', 'userNotification'));
    }

    public function editprofile(Request $request, $user_id)
    {
        $user = auth()->user();
        $userNotification = $user->userNotifications;
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

        return view('accountedit', compact('user', 'userDetails', 'userNotification','errorMessage'));
    }



    // update profile
   public function update(Request $request, $id)
    {   
        // dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:14',
            'company_website' => 'required',
            'complete_address' => 'required|string|max:255',
            'company_size' => 'required',
            'profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get the authenticated user
        $user = auth()->user();

        // Update User model fields
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Check if profile image is uploaded
        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profile_pics', 'public');
            $user->profile_path = $profilePath;
        }

        $user->save();

        // Create or update the UserDetails model
        $userDetails = $user->userDetails()->firstOrNew([]);  // relation

        // Update UserDetails fields
        $userDetails->phone_number = $request->input('phone');
        $userDetails->company_website = $request->input('company_website');
        $userDetails->complete_address = $request->input('complete_address');
        $userDetails->company_size = $request->input('company_size');

        $userDetails->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    // reset password

    public function changePassword(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:4|confirmed',
        ]);

        $user = Auth::user();

        // Verify the old password
        if (!Hash::check($validatedData['old_password'], $user->password)) {
            return redirect()->back()->with('error', 'Old password is incorrect.');
        }

        // Update the password
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect()->back()->with('success_password', 'Password updated successfully!');
    }

}
