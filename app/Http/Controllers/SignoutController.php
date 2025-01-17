<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class SignoutController extends Controller
{
    public function logout(Request $request)
    {
        $request->session()->forget("loggedInUser");
        return redirect(Route("login.index"));
    }
}
