<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use App\Models\{User,UserDetail};
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\{Hash,Validator,Auth};
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles; // for permission role
use Spatie\Permission\Models\Role;
use Illuminate\Pagination\Paginator;
use App\Notifications\UserSendNotification; // include for Send Notification to user
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable; 
use Illuminate\Support\Str; // Random password in string

use Illuminate\Http\Request;

class UserController extends Controller
{

    use HasRoles;  // for role
    use Notifiable;

    public function dispatcherpage(Request $request)
    {
        $user = auth()->user();
        $id =$user->id;

        // Flag to determine active element
        // $activeElement = 'active'; // Change this value to match your specific logic
        $activeElement = \Route::currentRouteName();
        // dd($activeElement);

        
        // fetch data with pagination +++++
        $users = User::role('carrier')->paginate(2);
        return view('dispatchersmanagement', compact('users','activeElement'));

    }
    
    // ADD User
    public function add(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'role' => ['required'],
        ], [
            'email.unique' => 'Email already exists',
            'phone.numeric' => 'Phone must be a number',
        ]);

        try {
            $user = auth()->user();
            $password = Str::random(10);

            // Create a new user
            $newUser = User::create([
                'edit_by' => $user->id,
                'name' => $validatedData['name'],
                'password' => Hash::make($password),
                'email' => $validatedData['email'],
            ]);

            // Assign a role to the user
            if ($validatedData['role'] == 'carrier') {
                $newUser->assignRole('carrier');
            } else {
                $newUser->assignRole('distributor');
            }
            
            // Create or update user details
            $phone = $validatedData['phone'];
            UserDetail::create([
                'user_id' => $newUser->id
                ]);

            $userDetail = UserDetail::updateOrCreate(
                ['user_id' => $newUser->id],
                ['phone_number' => $phone]
            );

            // Notification logic
            $emails = $newUser->email;
            $user_id = $newUser->id;
            Notification::send($newUser, new UserSendNotification($emails, $user_id, $password));
            
            return redirect()->back()->with('success', 'Dispatcher added successfully');

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

            return response()->json(['successDelete' => 'User deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['successDelete' => 'Failed to delete user']);
        }
    }
    //  Update
    public function edit(Request $request)
    {   
        try {
            $userId = $request->input('user_id');

            $validator = Validator::make($request->all(), [
                'nameedit' => 'required|string',
                'emailedit' => 'required|email|unique:users,email,'.$userId,
                'phoneedit' => 'required|numeric',
            ], [
                'emailedit.unique' => 'Email already exists',
                'phoneedit.numeric' => 'Phone must be a number',
            ]);

            
            if ($validator->fails()) {
                return response()->json([
                    'errorvalidation' => $validator->errors(),
                ], 422);
            }
            
            $user = User::find($userId);

            if (!$user) {
                throw new \Exception('User not found');
            }
            // dd($request->hasFile('imageedit'));
            // $image_path =$request->input('profile');
            if ($request->hasFile('imageedit')) {
                $profilePath = $request->file('imageedit')->store('profile_pics', 'public');
                $user->profile_path = $profilePath;
            }  
            // Assigning values from the validated request ++++
            $user->name = $request->input('nameedit');
            $user->email = $request->input('emailedit');
            $user->save();

            $userDetails = $user->userDetails;  // relation 

            if (!$userDetails) {
                $userDetails = new UserDetails();
                $userDetails->user_id = $userId;
            }

            
            $userDetails->phone_number = $request->input('phoneedit');
            $userDetails->save();
            
            return response()->json([
                'user' => $user,
                'userDetails' => $userDetails,
                // 'errorvalidation' => $validation,
                'successUpdate' => 'Update successful',
                
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ],500);
        }
    }

    // fetch Data for edit
    public function fetchdata(Request $request)
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
    public function searchData(Request $request)
    {   
        // Fetch users where the name or email matches the search term
        $search = $request->input('search') ?? "";
        If($search==""){
        //   $users = User::role('carrier')->paginate(2);
          $users = User::role(['carrier', 'distributor'])->paginate(2);

        }else{
            //   $users = User::role(['carrier', 'distributor'])
            //             ->where('name', 'LIKE', "%$search%")
            //             ->orWhere('email', 'LIKE', "%$search%")
            //             ->paginate(2);
            
        
            $users = User::role(['carrier', 'distributor'])
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->orWhereHas('userDetails', function ($query) use ($search) {
                        $query->where('company_name', 'LIKE', "%$search%");
                    });
            })
            ->paginate(2);

        
            // $userdetails = User::where('name', 'LIKE', "%$search%")
            //             ->orWhere('email', 'LIKE', "%$search%")
            //             ->get();

            // return view('search_results', ['users' => $users]);
        }
        return view('dispatchersmanagement', compact('users','search'));
    
    }


}
