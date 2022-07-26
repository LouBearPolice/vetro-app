<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('home.register');
    }

    public function store(Request $request){

        //Validate
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'password' => 'required|confirmed',
        ]);    

        //Save User
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Sign the user in //Returns the user model.
        auth()->attempt($request->only('email', 'password')); 

        //Redirect - OR ->route('home');
        return redirect("/");
    }
}
