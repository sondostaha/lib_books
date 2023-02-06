<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;



class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function handleRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|min:5|max:50',
            'is_admin' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin
        ]);

        //login

        Auth::login($user);

        //send mail
        //Mail::to($user->email)->send(new RegisterMail);
        
        return redirect( route('books.index') );

        

    }
    public function login()
    {
        return view('auth.login');
    }
    public function handleLogin(Request $request)
    {
        $request->validate
        ([
            'email' => 'required|email|max:100',
            'password' => 'required|max:50',
            
        ]);

        $is_login =Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        
        if(! $is_login )
        {
            return back();
        }else{
            return redirect(route('books.index'));
        }
        

    }
    public function logout()
    {
        Auth::logout();
        return back();
    }

    public function githubRedirect(Request $request)
    {
        return Socialite::driver('github')->redirect();
    }
    public function githubCallback(Request $request)
    {
        $user = Socialite::driver('github')->user();

        //dd($user);

        $email = $user->email;
        $user_db =User::where('email', '=', 'email')->first();

        if($user_db==null){
            $register_user = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make('123456'),
                'oauth_taken'=>$user->taken
            ]);
            Auth::login($register_user);
        }else{
            Auth::login($user_db);
        }

        return redirect(route('books.index'));

    }
}
