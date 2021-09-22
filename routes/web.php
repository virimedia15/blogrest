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
//RUTA DE LOGIN
//$router->get('/login/{user}/{pass}', 'AuthController@login');

//PROTEGER LA URL
//$router->group(['middleware'=>['auth']], function() use($router){

//FUNCIONES PARA USUARIOS
$router->get('/usuarios', 'UserController@index');
$router->get('/usuarios/{user}', 'UserController@get');
$router->post('/usuarios', 'UserController@create');
$router->put('/usuarios/{user}', 'UserController@update');
$router->delete('/usuarios/{user}', 'UserController@destroy');

//FUNCIONES PARA TOPICS
$router->get('/topico', 'TopicController@index');
$router->get('/topico/{topic}', 'TopicController@get');
$router->post('/topico', 'TopicController@create');
$router->put('/topico/{topic}', 'TopicController@update');
$router->delete('/topico/{topic}', 'TopicController@destroy');

//FUNCIONES PARA Posts
$router->get('/post', 'PostController@index');
$router->get('/post/{post}', 'PostController@get');
$router->post('/´post', 'PostController@create');
$router->put('/post/{post}', 'PostController@update');
$router->delete('/post/{post}', 'PostController@destroy');
//}
//);

