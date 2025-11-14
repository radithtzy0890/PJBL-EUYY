<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. tangkep variabel
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        // 2. cek di database (email, password)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->role; // (superadmin, admin, user)
            
            if ($role === 'superadmin' || $role === 'admin') {
                // ngarah dashboard
                return redirect(route('dashboard'));
            } else {
                // ngarah homepage
                return redirect(route('home'));
            }
        }

        return back();
    }

    public function register(Request $request)
    {
        // 1. tangkep data
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;

        // 2. validasi (email udh ada atau blm)
        $isExist = User::where('email', $email)->first();
        if ($isExist) {
            return back();
        }
        
        // 3. check password
        if ($password !== $password_confirmation) {
            return back();
        }

        // 4. hash password
        $hashPass = Hash::make($password);

        // 5. masukin ke db
        $user = User::create([
            "name" => $name,
            "email" => $email,
            "password" => $hashPass,
            "role" => "user"
        ]);

        // 6. arahin ke login
        return redirect(route('login'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect(route('home'));
    }
}
