<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*------------home directory-----------*/
$router->get('/', 'HomeController@index');
$router->get('/dashboard', 'HomeController@index');


/*============== Auth Route =======================*/
$router->get('/login', ['middleware' => 'guest', 'uses' => 'AuthController@index']);
$router->post('/login', ['middleware' => 'guest', 'uses' => 'AuthController@login']);
$router->get('/logout', ['middleware' => 'auth', 'uses' => 'AuthController@logout']);


/*=================== Student Route ===============*/
$router->get('/students', 'StudentController@index');
$router->get('/students/add', 'StudentController@create');
$router->post('/students/add', 'StudentController@store');


/*=================== Attendance Route ===============*/
$router->get('/attendance','AttendanceController@index');
$router->get('/attendance/daily-reports','AttendanceController@index');
$router->get('/attendance/monthly-reports','AttendanceController@monthlyAttendance');


/*=================== SMS Route ===============*/
$router->get('/sms','SmsController@index');
$router->get('/sms/logs','SmsController@index');


/*=================== Settings Route ===============*/
$router->get('/settings','SettingsController@index');
$router->post('/settings','SettingsController@store');


$router->post('/_health', function () {
    return "POST : tarek monjur";
});

$router->get('/_health', function () {
    return "GET : tarek monjur";
});


/*===================== Api Route ======================*/
$router->group(['prefix' => env('APP_API_VERSION')], function () use ($router) {
    $router->post('/attendances', 'ApiController@storeAttendance');
//    $router->get('/attendances', 'ApiController@storeAttendance');
//    $router->get('/attendances[/{student_id}]', 'ApiController@storeAttendance');
});

