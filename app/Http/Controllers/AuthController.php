<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register (Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
        return $user;
    }
    public function login(Request $request){
        $credentials = $request->only('name', 'password');
    
        if(empty($credentials['password'])){
            throw new AuthenticationException();
        }
    
        if(!Auth::attempt($credentials)){
            throw new AuthenticationException();
        }
    
        // Authentication successful
        return response()->json(['message' => 'Login successful']);
    }
    
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'Logout successful']);
    }
}
