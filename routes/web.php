<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* profil */
Route::get('/profil/uredi_profil/{id}', 'UserController@edit_form')->name('profil.uredi_profil');
Route::post('/profil/uredi_profil/{id}', 'UserController@edit')->name('profil.uredi_profil');

/* Kolegij */
Route::get('/kolegiji/pogled', 'KolegijController@index')->name('kolegiji.pogled');
Route::get('/kolegiji/dodaj', 'KolegijController@create_form')->name('kolegiji.dodaj');
Route::get('/kolegiji/uredi/{id}', 'KolegijController@edit_form')->name('kolegiji.uredi');
Route::get('/kolegiji/izbrisi/{id}', 'KolegijController@delete')->name('kolegiji.izbrisi');

Route::post('/kolegiji/spremi', 'KolegijController@create')->name('kolegiji.spremi');
Route::post('/kolegiji/uredi/{id}', 'KolegijController@edit')->name('kolegiji.uredi');

/* predavanje */
Route::get('/predavanja/pogled/{id}', 'PredavanjeController@index')->name('predavanja.pogled');
Route::get('/predavanja/dodaj/{id}', 'PredavanjeController@create_form')->name('predavanja.dodaj');
Route::get('/predavanja/uredi/{id}', 'PredavanjeController@edit_form')->name('predavanja.uredi');

Route::post('/predavanja/spremi', 'PredavanjeController@create')->name('predavanja.spremi');
Route::post('/predavanja/uredi/{id}', 'PredavanjeController@edit')->name('predavanja.uredi');

/* dolasci */
Route::get('/dolasci/pogled_ucenik/{id}', 'DolazakController@predavanja_ucenik')->name('dolasci.pogled_ucenik');
Route::get('/dolasci/pogled_prof/{id}', 'DolazakController@users')->name('dolasci.pogled_prof');

Route::post('/dolasci/modify', 'DolazakController@modify')->name('dolasci.modify');
Route::post('/dolasci/create', 'DolazakController@create')->name('dolasci.create');

/* dodavanje studenata */
Route::get('/studenti/prikazi/{id}', 'UserController@index')->name('studenti.prikazi');

Route::post('/studenti/dodaj/{id}', 'UserController@search')->name('studenti.dodaj');
Route::post('/userkolegij/create', 'UserKolegijController@create')->name('userkolegij.create');





