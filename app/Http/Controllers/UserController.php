<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        try{
            $perPage = $request->input('per_page', 10);
            $users = User::paginate($perPage);
            return view('users', compact('users'));
        }catch(Exception $e){
            info("Error " .  $e->getMessage());
            return view('errors.500');
        }
    }
}
