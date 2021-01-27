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

use App\Models\task;
use App\Models\task_member;
use App\Models\task_role;

Route::get('/', function () {
    // return view('welcome');

	// $task = new task;

	// $task->name = 'Mi primera actividad';
	// $task->description = 'Mi descripción';
	// $task->status = 0;
	// $task->start_date = time();
	// $task->due_date = time() + 10000;

	// $task->save();

	// $role = new task_role;

	// $role->name = 'Coordinador';

	// $role->save();

	// $member = new task_member;

	// $member->name = 'Sofia';
	// $member->task_id = $task->id;
	// $member->task_role_id = $role->id;

	// $member->save();

	dd(task::with('members')->first()->toArray());
});
