<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function aboutus(){
        if(true){
            return redirect()->route('article');
        }
    }
}
