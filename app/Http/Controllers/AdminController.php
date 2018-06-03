<?php
namespace App\Http\Controllers;

//use Request;
use Illuminate\Http\Request;
use App\Torneos;
use App\Equipos;
use App\Fecha;
use App\Jugador;



class AdminController extends Controller
{

  private $nombre_torneo;

  public function tournament_details(){
    return view('admin');
  }

  public function new_tournament(Request $request){
    //recupero informacion de los formularios
    $input = $request->only('tname','format', 'maxp', 'teams');

    $url = '/admin/'.$input['tname'].'/'.$input['format'].'/'.$input['maxp'].'/'.$input['teams'];

    return redirect($url);
  }

  private function add_schedule(&$nombre_torneo){
    $teams = Equipos::all()->where('torneo', "$nombre_torneo");
//    $equipos = [];
//    for($i = 0;$i < count($teams); $i++){
//      array_push($equipos,$teams[$i]['nombre']);
//    }
    info($teams);
    return $teams;
    //return $equipos;
  }


  public function add_tournament(Request $request){
    $nombre = $request->tname;

    $torneo = new Torneos();
    $torneo->nombre = $nombre;
    $torneo->formato = $request->format;
    $torneo->cantPlayers = $request->maxp;
    $torneo->cantTeams = $request->teams;
    $torneo->estado = 'activo';


    $torneo->save();


    $this->add_schedule($nombre);

  }

  public function add_teams($tname, $format, $maxp, $teams){
    return view('add-teams')
    ->with('tname', $tname)
    ->with('format', $format)
    ->with('maxp', $maxp)
    ->with('teams', $teams);
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
 /*private function roundRobin( array $teams ){

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
*/

}
