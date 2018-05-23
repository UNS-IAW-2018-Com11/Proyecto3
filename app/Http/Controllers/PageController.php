<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function torneos_index(){
      return view('index');
    }

    public function contact(){
      return view('contact');
    }
}
