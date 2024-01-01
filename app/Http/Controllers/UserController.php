<?php

namespace App\Http\Controllers;
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

class UserController extends Controller
{

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
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email', 
            'phone' => 'required|numeric', 
        ], [
            'email.unique' => 'Email already exists', 
            'phone.numeric' => 'Phone must be a number', 
        ]);

        try {
            $user = auth()->user();

            $newUser = User::create([
                'edit_by' => $user->id,
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
            ]);
            $newUser->assignRole('carrier');

            $phone = $validatedData['phone'];

            $userDetails = UserDetail::updateOrCreate(
                ['user_id' => $newUser->id],
                ['phone_number' => $phone]
            );

            return redirect()->back()->with('success', 'Dispatcher details added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
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
    //  Update
    public function edit(Request $request)
    {   
        try {
            $userId = $request->input('user_id');
            $nameedit = $request->input('nameedit');
            $emailedit = $request->input('emailedit');
            $phoneedit = $request->input('phoneedit');

            $request->validate([
                'nameedit' => 'required|string',
                'emailedit' => 'required|email|unique:users,email',
                'phoneedit' => 'required|numeric',
            ], [
                'emailedit.unique' => 'Email already exists',
                'phoneedit.numeric' => 'Phone must be a number',
            ]);

            $user = User::find($userId);

            if (!$user) {
                throw new \Exception('User not found');
            }

            $user->name = $nameedit;
            $user->email = $emailedit;
            $user->save();

            $userDetails = $user->userDetails;

            if (!$userDetails) {
                $userDetails = new UserDetails();
                $userDetails->user_id = $userId;
            }

            $userDetails->phone_number = $phoneedit;
            $userDetails->save();
            
            return response()->json([
                'user' => $user,
                'userDetails' => $userDetails,
                'successdelete' => 'Update successful',
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    
   
    // Data for editdata
    public function editdata(Request $request)
    {
        try {
        $userId = $request->input('user_id');

        // Fetch user data
        $user = User::find($userId);

        if (!$user) {
        throw new \Exception('User not found');
        }

        $userDetails = $user->userDetails; // if relation

        // both user and userDetails as JSON
        return response()->json([
        'user' => $user,
        'userDetails' => $userDetails,
        ]);
        } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);

        }
    }  

    // Searching 
    public function serchdata(Request $request)
    {   
        // Fetch users where the name or email matches the search term
        $search = $request->input('search') ?? "";
        If($search==""){
          $users = User::role('carrier')->get();
        }else{
          $users = User::role('carrier')
                    ->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->get();
        
        }
        
        // $userdetails = User::where('name', 'LIKE', "%$search%")
        //             ->orWhere('email', 'LIKE', "%$search%")
        //             ->get();

        // return view('search_results', ['users' => $users]);

        return view('dispatchersmanagement', compact('users'));
    
    }


}
