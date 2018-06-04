<?php
use App\Testmongodb;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//use MongoDB\Client as Mongo;

/*Route::get('mongo', function(Request $request) {
    $collection = (new Mongo)->mydatabase->mycollection;

    return $collection->find()->toArray();
});*/

Route::get('/', 'VisitorController@show_torneos')->name('index');

Route::get('/contact', 'VisitorController@contact')->name('contact');

Route::get('/torneos/{id}', 'VisitorController@show_teams')->name('torneo');

Route::get('/team/{id}', 'VisitorController@team_info')->name('team');

Route::get('/admin', 'AdminController@tournament_details')->name('admin');

Route::get('/admin/new-tournament', 'AdminController@new_tournament')->name('new_tourney');

Route::get('/admin/{tname}/{format}/{maxp}/{teams}', 'AdminController@add_teams')->name('add_teams');

Route::get('editor', 'AdminController@editor')->name('editor');

Route::get('editor/{id}', 'AdminController@editor_partidos')->name('editor_partidos');

Route::post('/add-teams', 'AdminController@add_team_toDB');

Route::post('/add-tournament', 'AdminController@add_tournament');
?>
