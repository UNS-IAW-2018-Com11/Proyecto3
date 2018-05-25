<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Torneos;

class Index extends Controller
{
      public function show_torneos(){
        $torneos = Torneos::all();
        return view('index')->with('torneos',$torneos);
    }

    public function delete_torneos(){
      //falta hacer, seguro lleva id por parametro
    }

    public function add_torneos(){
      //falta hacer
    }


}


?>
