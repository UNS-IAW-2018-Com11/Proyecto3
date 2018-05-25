<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Equipos;
use App\Fecha;
use App\Partido;

class Team extends Controller
{
      public function show_teams($id){


  //      print_r(Fechas::all()->where('torneo', "$id"));
     $teams = Equipos::all()->where('torneo', "$id");
  //   $fechas = Fecha::all()->where('torneo', "$id");
     $fechas = Fecha::with('partido')->get();
     $partidoss = Partido::with('fechas')->get();

     


    return view('torneo', compact(['teams','fechas','partidoss']));
    }

    public function delete_torneos(){
      //falta hacer, seguro lleva id por parametro
    }

    public function add_torneos(){
      //falta hacer
    }


}


?>
