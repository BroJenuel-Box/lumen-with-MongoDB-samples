<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'api'], function () use ($router) {
    // List of all Samples
    $router->post('create/test', 'MongoDB\TestController@create_test');
    $router->get('get/test', 'MongoDB\TestController@get_tests');
    $router->delete('delete/test', 'MongoDB\TestController@delete_test');
    $router->get('get/test/date', 'MongoDB\TestController@get_tests_with_dates');


    // Person
    $router->get('get/person/', 'MongoDB\PersonController@get_persons');
    $router->post('create/person/', 'MongoDB\PersonController@create_person');
    $router->post('set/person/information', 'MongoDB\PersonController@set_information');
    $router->post('add/person/book', 'MongoDB\PersonController@addBooks');
    $router->post('add/person/car', 'MongoDB\PersonController@add_to_car');

    // coz lessons
    $router->get('get/lesson/changes', 'CozLesson\CozLessonsController@get_cozlesson_changes');
    $router->get('get/lesson', 'CozLesson\CozLessonsController@getCozLesson');
    $router->get('get/change/lesson', 'CozLesson\CozLessonsController@get_change_lesson');
});
