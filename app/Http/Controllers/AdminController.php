<?php
namespace App\Http\Controllers;

//use Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Torneos;
use App\Equipos;
use App\Fecha;
use App\Jugador;
use App\Partido;
use App\User;
use Auth;
use Session;

class AdminController extends Controller{

  private $nombre_torneo;

  public function tournament_details(){
    $torneos = Torneos::all();
    $usuarios = User::where('class','!=','admin')->get();

    if(!empty(Auth::user())){
        $name = Auth::user();
        return view('admin')->with('torneos',$torneos)->with('user', $name)->with('usuarios',$usuarios);
      }
    return view('admin')->with('torneos', $torneos)->with('usuarios', $usuarios);
  }

  public function new_tournament(Request $request){
    //recupero informacion de los formularios
    $input = $request->only('tname','format', 'maxp', 'teams');

    $url = '/admin/'.$input['tname'].'/'.$input['format'].'/'.$input['maxp'].'/'.$input['teams'];

    return redirect($url);
  }

  private function add_schedule(&$nombre_torneo){
    $teams = Equipos::where('torneo', $nombre_torneo)->get();
    $equipos = array();

    for($i = 0;$i < count($teams); $i++){
      array_push($equipos, $teams[$i]->nombre);
    }

    $rounds = $this->roundRobin($equipos);

    $fechas = array();
    foreach($rounds as $index => $games){
      $partidos = array();
      foreach($games as $play){
        $partido = array(
          'local' => $play["Home"],
          'visitante' => $play["Away"],
          'puntosLocal' => 0,
          'puntosVisitante' => 0,
          'estado' => 'pendiente'
        );
        array_push($partidos, $partido);
        $part = new Partido();
        $part->local = $play["Home"];
        $part->visitante = $play["Away"];
        $part->puntosLocal = 0;
        $part->puntosVisitante = 0;
        $part->estado = 'pendiente';

        $part->save();
      }
      /*  $fecha = array(
      'fecha' => $index+1,
      'torneo' => $nombre_torneo,
      'partidos' => $partidos
    );
    array_push($fechas, $fecha);*/
    $fecha = new Fecha();
    $fecha->fecha = $index+1;
    $fecha->torneo = $nombre_torneo;
    $fecha->partidos = $partidos;

    $fecha->save();
  }
}

public function add_tournament(Request $request){
  $nombre = $request->tname;

  $torneo = new Torneos();
  $torneo->nombre = $nombre;
  $torneo->formato = $request->format;
  $torneo->cantPlayers = $request->maxp;
  $torneo->cantTeams = $request->teams;
  $torneo->estado = 'activo';
  $torneo->editores = [];

  $torneo->save();

  $this->add_schedule($nombre);
}

public function add_teams($tname, $format, $maxp, $teams){
  $user = Auth::user();
  return view('add-teams')
  ->with('tname', $tname)
  ->with('format', $format)
  ->with('maxp', $maxp)
  ->with('teams', $teams)
  ->with('user',$user);
}

public function add_team_toDB(Request $request){
  $equipo = new Equipos();
  $equipo->nombre = $request->nombre;
  $equipo->GP = $request->GP;
  $equipo->W = $request->W;
  $equipo->L = $request->L;
  $equipo->PF = $request->PF;
  $equipo->PC = $request->PC;
  $equipo->Pts = $request->Pts;
  $equipo->torneo = $request->torneo;
  $equipo->jugadores = $request->jugadores;

  $this->nombre_torneo = $request->torneo;

  $hola = $request->jugadores[0];
  $aux = count($request->jugadores);

  for ($i = 0; $i < count($request->jugadores); $i++) {
    $player = new Jugador();
    $player->nombre = $request->jugadores[$i]['nombre'];
    $player->edad = $request->jugadores[$i]['edad'];
    $player->DNI = $request->jugadores[$i]['DNI'];

    $player->save();
  }

  $equipo->save();
}

/**
* CREDITOS: https://www.phpro.org/examples/Create-Round-Robin-Using-PHP.html
* Create a round robin of teams or numbers
*
* @param    array    $teams
* @return    $array
*
*/
private function roundRobin( array $teams ){

  $away = array_splice($teams,(count($teams)/2));
  $home = $teams;
  for ($i=0; $i < count($home)+count($away)-1; $i++)
  {
    for ($j=0; $j<count($home); $j++)
    {
      $round[$i][$j]["Home"]=$home[$j];
      $round[$i][$j]["Away"]=$away[$j];
    }
    if(count($home)+count($away)-1 > 2)
    {
      $s = array_splice( $home, 1, 1 );
      $slice = array_shift( $s  );
      array_unshift($away,$slice );
      array_push( $home, array_pop($away ) );
    }
  }
  return $round;
}

public function editor(){
  $user = Auth::user();
  if($user->class === 'admin'){
    $torneos = Torneos::all();
    return view('editor')->with('torneos',$torneos)->with('user',$user);
  }
  if($user->class === 'editor'){
    $torneos = Torneos::all();
    $torneos_array = [];

    foreach ($torneos as $item) {
      for($i = 0; $i < count($item->editores); $i++){
        if($item->editores[$i] === $user->email){
          //el user es editor de dicho torneo
          array_push($torneos_array, $item);
        }
      }
    }
    return view('editor')->with('torneos',$torneos_array)->with('user',$user);
  }

}

public function editor_partidos($id){
  $fechas = Fecha::where('torneo', $id)->get();
  $user = Auth::user();
  if($user->class === 'editor' || $user->class === 'admin'){
    return view('editor')->with('fechas',$fechas)->with('user',$user);
  }

  return view('editor')->with('fechas',$fechas);
}

public function edit_match(Request $request){
  $fecha = Fecha::where('torneo',$request->torneo)
  ->where('fecha', intval($request->fecha))
  ->first(); //el get() siempre devuelve una colección, por eso nos daba un arreglo de entrada y teniamos que hacer fecha[0] para simplemente tener la unica fecha que devuelve la consulta
  // ademas, por tener una coleccion no se puede hacer el save despues.

  for($i=0; $i < count($fecha->partidos); $i++){
    if($fecha->partidos[$i]['local'] === $request->local)
    if($fecha->partidos[$i]['visitante'] === $request->visitante){
      //original es una variable auxiliar donde se copia todo el arreglo de partidos, ya que los atributos de partidos no se pueden modificar porque eloquent usa un "metodo magico" "__get"
      //que devuelve una copia del arreglo y no una referencia. Una vez está esa copia en original, la modifico ahí y cambio el atributo 'partidos' de fecha entero sin acceder a sus propios atributos

      $original = $fecha->partidos;
      $original[$i]['puntosLocal'] = intval($request->puntosLocal);
      $original[$i]['puntosVisitante'] = intval($request->puntosVisitante);
      $original[$i]['estado'] = 'finalizado';
      $fecha->partidos = $original;
    }
  }

  $fecha->save();

  $local = Equipos::where('nombre', $request->local)->first();
  $visitante = Equipos::where('nombre', $request->visitante)->first();

  if(!empty($local) && !empty($visitante)){
    $local->GP = $local->GP + 1;
    $local-> PF = $local->PF + $request->puntosLocal;
    $local-> PC = $local->PC + $request->puntosVisitante;
    $visitante->GP = $visitante->GP + 1;
    $visitante-> PF = $visitante->PF + $request->puntosVisitante;
    $visitante-> PC = $visitante->PC + $request->puntosLocal;

    if($request->puntosLocal > $request->puntosVisitante){
      //gano el equipo local
      $local->W = $local->W + 1;
      $local-> Pts = $local-> Pts + 2;
      $visitante->L = $visitante->L + 1;
      $visitante->Pts = $visitante->Pts + 1;
    }else{
      //gano el visitante
      $local->L = $local->L + 1;
      $local-> Pts = $local-> Pts + 1;
      $visitante->W = $visitante->W + 1;
      $visitante->Pts = $visitante->Pts + 2;
    }
    $local->save();
    $visitante->save();
  }

  return back();

}

  public function add_editors(Request $request){
    $torneo = Torneos::where('nombre', $request->torneo)->first();

    $bandera = false;

    for($i = 0; $i < count($torneo->editores); $i++){
      if($torneo->editores[$i] === $request->user){
        $bandera = true;
        break;
      }
    }
    if($bandera){
      $torneos = Torneos::all();
      $users = User::where('class','!=','admin')->get();

      $error = "User ".$request->user." is already an editor for the selected tournament.";

      Session::flash('message', $error);
      Session::flash('alert-class', 'alert-danger');
      return Redirect::to('admin');
    }
    else{
      $user = User::where('email', $request->user)->first();
      $user->class = 'editor';
      $user->save();

      $mensaje = "User ".$request->user." added as an editor for the selected tournament.";
      Session::flash('message', $mensaje);
      Session::flash('alert-class', 'alert-success');
      $original = $torneo->editores;
      array_push($original, $request->user);
      $torneo->editores = $original;
      $torneo->save();
      return Redirect::to('admin');
    }
  }
}
