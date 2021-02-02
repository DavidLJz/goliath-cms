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

use Illuminate\Http\Request;

// namespace('Namespace Under Controller')
Route::name('assignments.')->group(function () {
	Route::get('/tareas', function (Request $request) {
		return view('test')->with(compact('request'));
	});

	Route::get('/crear_tarea', function (Request $request) {
		$min_dates = date('Y-m-d', time()-5184000);
		$max_dates = date('Y-m-d', time()+5184000);

		return view('assignments.create')
			->with(compact('request','min_dates','max_dates'));
	});
});
