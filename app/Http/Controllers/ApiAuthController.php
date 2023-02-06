<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class ApiAuthController extends Controller
{
    public function handleRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|min:5|max:50',
            'is_admin' => 'required'
            
        ]);
    
        if ($validator->fails()) {
                $errors = $validator->erors();
                return response()->json($errors);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin,
            'access_taken'=>Str::random(64),
        ]);

        return response()->json($user);
    }
    public function handleLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:100',
                'password' => 'required|max:50',

            ]);

        if ($validator->fails()) 
        {
                $errors = $validator->erors();
                return response()->json($errors);
        }

        $is_user = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        
        if(! $is_user){
            $error = "your data are not correct";
            return response()->json($error);
        }
        $user=User::where('email','=',$request->email)->first();

        $new_access_taken = Str::random(64);

        $user->updated([
            'access_taken' => $request->new_access_taken
        ]);
        return response()->json($new_access_taken);
        
    }
    public function logout(Request $request)
    {
        $access_taken = $request->access_taken;
        $user = User::where('access_taken', '=', $access_taken)->first();

        if($user ==null)
        {
            $error = "token not correct";
            return response()->json($error);
        }

        $user->update
        ([
            'access_taken' => Null
        ]);
        $success = "logout successfully";
        return response()->json($success);
    }
}
