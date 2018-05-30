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

Route::get('/{id}', 'VisitorController@show_teams')->name('torneo');

Route::get('/team', 'VisitorController@team_info()')->name('team');

?>
