<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Http\Controllers\Controller;

class UserDetailController extends Controller
{

    public function completeProfile(){
        return view('auth.complete_profile');
    }


   public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'company_website' => 'required',
            'complete_address' => 'required',
            'phone_number' => 'required',
            'company_size' => 'required',
        ]);

        // Assuming UserDetails is your model
        $userDetails = UserDetail::updateOrCreate(
            ['user_id' => auth()->user()->id], 
            [
                'company_name' => $request->company_name,
                'company_website' => $request->company_website,
                'complete_address' => $request->complete_address,
                'phone_number' => $request->phone_number,
                'company_size' => $request->company_size,
                // Add other fields as needed
            ]
        );
        // Handle success or redirect as needed
        return view('/dashboard');
    }
     public function userdash(){
        return view('dashboard');
    }
}
