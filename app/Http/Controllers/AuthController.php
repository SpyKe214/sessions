<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    
    public function showLogin()
    {
        return view('auth.login');
    }

   
    public function login(Request $request)
    {
       
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

       
        $user = User::where('email', $request->email)->first();

        
        if ($user && Hash::check($request->password, $user->password)) {
            
           
            $token = Str::random(60); 
            
           
            session(['token' => $token, 'name' => $user->name]);

         
            return redirect('/');
        }

      
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ]);
    }

    
    public function logout(Request $request)
    {
      
        $request->session()->invalidate();
        $request->session()->regenerateToken();

   
        return redirect('/login');
    }
}