<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomAuthController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(CustomLoginRequest $request)
    {
//        $request->validate([
//            'email' => 'required | email',
//            'password' => 'required'
//        ]);

        $userLogin = $request->only('email','password');
        if(Auth::attempt($userLogin)){
//            $user = User::where('email',$request->email)->first(); //collection
            $user = DB::table('users')->where('email',$request->email)->first();
            toastSuccess('Đăng nhập thành công!');
            session()->put('userLogin',$user->name);
            return redirect()->route('admin.dashboard');
        }

    }

    public function showDashboard()
    {
        return view('backend.admin.dashboard');
    }

    public function showHome(){
        return view('frontend.home');
    }

    public function logOut()
    {
//        session()->flush();
        session()->forget('userLogin');
        return redirect()->route('customLogin');
    }
}
