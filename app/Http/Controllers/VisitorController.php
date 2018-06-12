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
      $name = Auth::user();
      return view('index')->with('torneos',$torneos)->with('user', $name);
    }

    return view('index')->with('torneos',$torneos);
  }

  public function show_teams($id){
    $teams = Equipos::all()->where('torneo', "$id")->sortByDesc('Pts');
    $fechas = Fecha::all()->where('torneo', "$id");
    $torneo = $id;

    return view('torneo', compact(['teams','fechas','torneo']));
  }

  //Info team especifico
  public function team_info($id){
    $team = Equipos::all()->where('nombre',"$id")->first();
    return view('team', compact(['team']));
  }

  public function contact(){
    return view('contact');
  }
}
?>
