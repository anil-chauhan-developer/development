<?php

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
    return redirect('/login');
});
Route::namespace('Auth')->group(function(){
    //Login Routes
    Route::match(['get','post'],'/login', 'Auth\LoginController@login')->name('login');
    Route::post('/logout','LoginController@logout')->name('logout');
});

Auth::routes();
Route::group(['middleware'=>['auth']],function (){
    Route::namespace('Backend')->group(function () {
      Route::get('/home', 'DashboardController@index')->name('home');
      /************Team Managment section*************/
      Route::get('/teams', 'TeamController@index')->name('teams');
      Route::match(['get','post'],'/teams/teamlist', 'TeamController@teamlist')->name('teamlist');
      Route::match(['get','post'],'/teams/teamcreate/{id}', 'TeamController@create')->name('teamcreate');
      Route::get('/teams/teamdetails/{id}', 'TeamController@details')->name('teamdetails');
      /************Player Managment section*************/
      Route::get('/players', 'PlayersController@index')->name('players');
      Route::match(['get','post'],'/players/playerlist', 'PlayersController@playerlist')->name('playerlist');
      Route::match(['get','post'],'/players/playercreate/{id}', 'PlayersController@create')->name('playercreate');
      Route::get('/players/playerdetails/{id}', 'PlayersController@details')->name('playerdetails');
      /************Matche Schedule Managment section*************/
      Route::get('/schedule', 'MatchscheduleController@index')->name('schedule');
      Route::match(['get','post'],'/schedule/schedulelist', 'MatchscheduleController@schedulelist')->name('schedulelist');
      Route::match(['get','post'],'/schedule/schedulecreate/{id}', 'MatchscheduleController@create')->name('schedulecreate');
      Route::get('/schedule/points/{id}', 'MatchscheduleController@points')->name('points');
      /************Point Table section*************/
      Route::get('/points', 'PointController@index')->name('points');
      Route::match(['get','post'],'/points/pointtable', 'PointController@index')->name('pointtable');
    });
  });
