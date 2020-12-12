<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function register(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->identity = 'user';
        $user_exist = User::where('email',$request->email)->first();
        if(isset($user_exist)){
            return view('user/register',['message' =>'Email Already in Use!']);
        }
        $user->save();
        return view('/welcome',['user' => $user->name]);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        Auth::attempt(['email'=>$email, 'password'=>$password]);
        return redirect(route('customer.shop'));
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('customer.shop'));
    }
}
