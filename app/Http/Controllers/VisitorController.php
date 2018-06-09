<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Torneos;
use App\Equipos;
use App\Fecha;
use Auth;

class VisitorController extends Controller{

  public function show_torneos(){
    $torneos = Torneos::all();
    if(!empty(Auth::user())){
      $name = Auth::user()->name;
      return view('index')->with('torneos',$torneos)->with('name', $name);
    }

    return view('index')->with('torneos',$torneos);
  }

  public function show_teams($id){
    //print_r(Fecha::all()->where('torneo', "$id"));
    $teams = Equipos::all()->where('torneo', "$id");
    $fechas = Fecha::all()->where('torneo', "$id");

    return view('torneo', compact(['teams','fechas']));
  }

  //Info team especifico
  public function team_info($id){
    $team = Equipos::all()->where('nombre',"$id")->first();
    //print_r($team);
    return view('team', compact(['team']));
  }

  public function contact(){
    return view('contact');
  }

}
?>
