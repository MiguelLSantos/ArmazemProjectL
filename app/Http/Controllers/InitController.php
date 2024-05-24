<?php

namespace App\Http\Controllers;



class InitController extends Controller
{
    public function page(){
       return view('init');
    }
    public function sobrePage()
    {
        return view('sobre');
    }
}
