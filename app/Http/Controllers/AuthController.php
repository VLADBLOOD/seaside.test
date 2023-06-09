<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route("registration")->with('alert', 'Error:' . $validator->errors()->first());
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->with('alert', 'You have Successfully logged in');
        }

        return redirect()->route("login")->with('alert', 'Opps! You have entered invalid credentials');
    }

    public function postRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->route("registration")->with('alert', 'Error:' . $validator->errors()->first());
        }

        $accountData = $request->all();
        $check = $this->createNewUser($accountData);

        return redirect()->route("home")->with('alert', 'Great! You have Successfully loggedin');
    }

    public function createNewUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect()->route('home')->with('alert', 'You have Successfully logout');
    }
}
