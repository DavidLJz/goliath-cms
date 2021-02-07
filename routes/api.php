<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'subjects' => SubjectController::class,
    'assignments' => AssignmentController::class,
    'student_groups' => StudentGroupController::class,
]);

// // namespace('Namespace Under Controller')
// Route::middleware('api')->name('api.subjects.')->group(function () {
// 	Route::get('/subjects/{id?}', 'SubjectController@index')->name('get');
// 	Route::post('/subjects', 'SubjectController@create')->name('post');
// });

// Route::middleware('api')->name('api.assignments.')->group(function () {
// 	Route::get('/assignments/{id?}', 'AssignmentController@index')->name('get');
// 	Route::post('/assignments', 'AssignmentController@create')->name('post');
// });

// Route::middleware('api')->name('api.student_groups.')->group(function () {
// 	Route::get('/student_groups', 'StudentGroupController@index')->name('get');
// });