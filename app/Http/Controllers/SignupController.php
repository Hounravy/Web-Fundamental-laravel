<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function signup() 
    {
        $request->validate([
            'name' => ['required|min:255'],
            'email' => ['required', 'email'],
            'password' => ['required|mix:5'],
        ]);
        
    }
}
