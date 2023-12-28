<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles; // for permission role
use Spatie\Permission\Models\Role;


use Illuminate\Http\Request;

class DispatcherController extends Controller
{
    // dispatcherpage
    use HasRoles;  // for role
    public function dispatcherpage(Request $request)
    {
        $user = auth()->user();
        $id =$user->id;
        // Retrieve all users who have the 'carrier' role
       
        $users = User::role('carrier')->get();
        // foreach( $users as $singleUser ){
        //     echo $singleUser->userDetails->phone_number . "<br>";

        // }
        // exit;
        
        return view('dispatchersmanagement', compact('users'));
    }

    // Add user
    public function add(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        // Find the user
        // $user = User::find($id);

        // Get the authenticated user
       $user = auth()->user();

        $newUser = User::create([
            'edit_by' => $user->id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        $newUser->assignRole('carrier'); // assine role
        // Create or update user details associated with the new user
        $phone = $request->input('phone');

        $userDetails = UserDetail::updateOrCreate(
            ['user_id' => $newUser->id], // Search criteria
            ['phone_number' => $phone] // Data to be updated or inserted
        );

        return redirect()->back()->with('success', 'Dispatcher details added successfully');
    }

    // Delete
    public function delete(Request $request)
    {
        $userId = $request->input('id');

        try {
            $user = User::findOrFail($userId);
            $user->delete();

            return response()->json(['message' => 'User deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete user']);
        }
    }




}
