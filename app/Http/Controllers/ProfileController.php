<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function edit()
    {
        $user = auth()->user();
        $userDetails = $user->userDetails;

        return view('editprofile', compact('user', 'userDetails'));
    }

}
