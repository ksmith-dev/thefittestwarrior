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

Route::get('/','WelcomeController@index');

Route::get('about', function () {
    return view('about');
});

Auth::routes();

Route::get('contact', 'ContactUsController@showContactUsView');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('view/health', 'HealthController@showHealthTab');
Route::get('view/nutrition', 'NutritionController@showNutritionTab');

Route::get('view/fitness', 'WorkoutController@showFitnessTab');
Route::get('workout/detail/{workout_id}', 'WorkoutController@showWorkoutView');

Route::get('fitness_group/gym', 'GroupController@gym');
Route::get('fitness_group/{identity}', 'GroupController@index');
Route::get('fitness_group/sign-up/{identity}', 'GroupController@sign_up');
Route::get('fitness_group/public/{status}/{identity}', 'GroupController@public_sign_up');

Route::get('view', 'ViewController@index');
Route::get('view/{type}', 'ViewController@index');
Route::get('view/{type}/{identity}', 'ViewController@index');
Route::get('view/{type}/{identity}/{modifier}', 'ViewController@index');

Route::get('form/{table}', 'FormController@form');
Route::get('form/{table}/{identity}', 'FormController@form');
Route::get('form/{table}/{identity}/{modifier}', 'FormController@form');

/*-------------------------------POST ROUTES-------------------------------*/

Route::post('store/{type}', 'FormController@store');
Route::post('store/{type}/{identity}', 'FormController@store');

Route::post('contact', 'ContactUsController@store');

Route::post('/', 'StayInformedController@store');

Route::post('fitness_group/sign-up/{identity}', 'GroupController@sendEmail');


