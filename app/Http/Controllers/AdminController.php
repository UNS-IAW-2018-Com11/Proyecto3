<?php
namespace App\Http\Controllers;

use Request;
use App\Torneos;

class AdminController extends Controller
{
    public function tournament_details(){
      return view('admin');
    }

    public function new_tournament(){
      //recupero informacion de los formularios
      $input = Request::only('tname','format', 'maxp', 'teams');

      $url = '/admin/'.$input['tname'].'/'.$input['format'].'/'.$input['maxp'].'/'.$input['teams'];

      return redirect($url);
    }

    public function add_teams($tname, $format, $maxp, $teams){
      return view('add-teams')
      ->with('tname', $tname)
      ->with('format', $format)
      ->with('maxp', $maxp)
      ->with('teams', $teams);
    }

    public function add_team_toDB(Request $request){
          dd($request);
      return 'hola pa';
    }
}
