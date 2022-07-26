<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){

        return view('home.login');

    }

    public function store(Request $request){

        //Validate
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]); 

        //Sign the user in //Returns the user model.
        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('status', 'Invalid login details.');
        }else{

        } 

        //Redirect - OR ->route('home');
        return redirect("/");
    }
}
