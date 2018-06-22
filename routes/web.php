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

Route::get('/admin', 'AdminController@tournament_details')->name('admin')->middleware('TestAdminCredentials');

Route::get('/admin/new-tournament', 'AdminController@new_tournament')->name('new_tourney')->middleware('TestAdminCredentials');

Route::get('/admin/{tname}/{format}/{maxp}/{teams}', 'AdminController@add_teams')->name('add_teams')->middleware('TestAdminCredentials');

Route::get('editor', 'AdminController@editor')->name('editor')->middleware('TestEditorCredentials');

Route::get('editor/{id}', 'AdminController@editor_partidos')->name('editor_partidos')->middleware('TestEditorCredentials');

Route::get('/videos', 'VisitorController@show_videos')->name('youtube');

Route::post('/add-teams', 'AdminController@add_team_toDB');

Route::post('/add-tournament', 'AdminController@add_tournament');

Route::post('/editor/update', 'AdminController@edit_match')->middleware('TestEditorCredentials');;

Route::post('/add-editors', 'AdminController@add_editors')->name('addEditors');
//Auth::routes(); sale de vendor/laravel/framework/src/Illuminate/Router.php, para modificarlo reemplazo las rutas de ahí por esta linea y me queda lo que sigue.
//No se modifica directamente en Router.php porque es codigo fuente de laravel que si hacemos un composer update en algun momento se sobreescribe todo.
// Authentication Routes...
//showLoginForm esta en el thread AuthenticateUser que usa LoginController
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/perfil', 'HomeController@index')->name('perfil');
?>
