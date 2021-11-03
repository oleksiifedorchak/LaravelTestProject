<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('Signed in');
        }

        return redirect("sign-in")->withSuccess('Login details are not valid');
    }

    public function register()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function dashboard(Request $request)
    {
        if(!Auth::check()){
            return redirect("sign-in")->withSuccess('You are not allowed to access');
        }

        $data['heading_title'] = 'Dashboard countries';

        $data['search'] = $request['search'];

        $data['countries'] = isset($request['search']) ?
            DB::table('country')->where('name', 'like', '%'.$request['search'].'%')->get() :
            DB::table('country')->get();

        return view('dashboard',$data);
    }


    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('sign-in');
    }
}
