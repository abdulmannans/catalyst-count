<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function loginIndex()
    {
        try{
            if(auth()->check()){
                return redirect()->route('home');
            }
            return view('login');
        }catch(Exception $e){
            info("Error " .  $e->getMessage());
            return view('errors.500');
        }
    }


    /**
     * Handle the login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        try{
            if (Auth::attempt($request->only('email', 'password'))) {
                return redirect()->route('home');
            }
            return view('/');
        }catch(Exception $e){
            info("Error " .  $e->getMessage());
            return view('errors.500');
        }
    }

     /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function registerIndex()
    {
        try{
            return view('register');
        }catch(Exception $e){
            info("Error " .  $e->getMessage());
            return view('errors.500');
        }
    }

    /**
     * Handle a registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        try{
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);
    
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            auth()->login($user);
    
            return redirect()->route('home');
        }catch(Exception $e){
            info("Error " .  $e->getMessage());
            return view('errors.500');
        }
    }

    public function logout()
    {
        try{
            if(auth()->check()){
                auth()->logout();
            }
            return view('login');
        }catch(Exception $e){
            info("Error " .  $e->getMessage());
            return view('errors.500');
        }
    }
}
