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

Route::get('/', 'Index@show_torneos')->name('index');

Route::get('/contact', 'PageController@contact')->name('contact');

Route::get('/{id}', 'Team@show_teams')->name('torneo');

?>
