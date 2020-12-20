<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use App\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:16'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user_exist = User::where('email',$request->email)->first();
        if(isset($user_exist)){
            return view('user/register',['message' =>'Email Already in Use!']);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'identity' => 'user',
        ]);

        return redirect(route('customer.shop'))->with('status', '註冊成功!');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        Auth::attempt(['email'=>$email, 'password'=>$password]);
        if(Auth::check()){
            if (Session::has('order_detail')) {
                $session_order_details = Session::get('order_detail');
                foreach($session_order_details as $order_detail){
                    OrderDetail::create([
                        'user_id' => Auth::user()->id ,
                        'name' => $order_detail->name,
                        'price' => $order_detail->price,
                        'buy_amount' => $order_detail->buy_amount,
                        'image_url' => $order_detail->image_url,
                    ]);
                }
            }
            return redirect(route('customer.shop'))->with('status', '登入成功!');
        }else{
            return redirect(route('login'))->with('status', '登入失敗!');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('customer.shop'))->with('status', '登出成功!');
    }
}
