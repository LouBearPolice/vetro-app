<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(){

        //Auing Authentication to log the user out.
        auth()->logout();

        //Redirect to home page.
        return redirect("/");  

    }
}
