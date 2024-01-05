<?php

namespace App\Http\Controllers;
use App\Models\{User,UserDetail};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class VisitController extends Controller
{
    public function visituser(Request $request, $id)
    {
        // User::query()->update(['name' => 'Rana']);

        // return redirect('/login');
        $user = User::find($id);
        $user->invitation_status = 'Accepted';
        $user->save();
        return redirect()->route('login');
    }
}


