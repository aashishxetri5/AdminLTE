<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function viewLogin()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                "email" => ["required", "email"],
                "password" => ["required"],
            ]
        );

        if ($validator->fails()) {
            return view('login')->with('errors', $validator->errors());
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return view('login')->with('errors', 'User does not exist');
        }

#        dd( Auth::attempt(['email' => $request->email, 'password' => $request->password]));

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard.index');
        } else {
            echo "Invalid credentials";
            echo Auth::user();
        }
    }

    public function register(Request $request)
    {
    }

    public function logout(Request $request)
    {

    }
}
