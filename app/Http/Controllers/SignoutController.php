<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class SignoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();

        // Optionally, you can invalidate the session to prevent session fixation attacks
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect(Route("signin.index"));
    }
}
