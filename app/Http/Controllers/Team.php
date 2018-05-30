<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Equipos;
use App\Fecha;

class Team extends Controller{

  public function show_teams($id){
    //print_r(Fecha::all()->where('torneo', "$id"));
    $teams = Equipos::all()->where('torneo', "$id");
    $fechas = Fecha::all()->where('torneo', "$id");
    
    return view('torneo', compact(['teams','fechas']));
  }

  public function delete_torneos(){
    //falta hacer, seguro lleva id por parametro
  }

  public function add_torneos(){
    //falta hacer
  }


}


?>
