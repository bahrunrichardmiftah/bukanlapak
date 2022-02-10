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

$router->get('/admin/pages', 'PageController@index');
$router->post('/admin/pages', 'PageController@store');
$router->get('/admin/page/{id}', 'PageController@show');
$router->put('/admin/page/{id}', 'PageController@update');
$router->delete('/admin/page/{id}', 'PageController@destroy');

$router->get('/admin/categories', 'CategoryController@index');
$router->post('/admin/categories', 'CategoryController@store');
$router->get('/admin/category/{id}', 'CategoryController@show');
$router->put('/admin/category/{id}', 'CategoryController@update');
$router->delete('/admin/category/{id}', 'CategoryController@destroy');

$router->get('/admin/products', 'ProductController@index');
$router->post('/admin/products', 'ProductController@store');
$router->get('/admin/product/{id}', 'ProductController@show');
$router->put('/admin/product/{id}', 'ProductController@update');
$router->delete('/admin/product/{id}', 'ProductController@destroy');

$router->get('/admin/users', 'UserController@index');
$router->post('/admin/users', 'UserController@store');
$router->get('/admin/user/{id}', 'UserController@show');
$router->put('/admin/user/{id}', 'UserController@update');
$router->delete('/admin/user/{id}', 'UserController@destroy');

$router->get('/admin/categoriesposts', 'CategoriesPostController@index');
$router->post('/admin/categoriesposts', 'CategoriesPostController@store');
$router->get('/admin/categoriesposts/{id}', 'CategoriesPostController@show');
$router->put('/admin/categoriesposts/{id}', 'CategoriesPostController@update');
$router->delete('/admin/categoriesposts/{id}', 'CategoriesPostController@destroy');

$router->get('/admin/comments', 'CommentController@index');
$router->post('/admin/comments', 'CommentController@store');
$router->get('/admin/comment/{id}', 'CommentController@show');
$router->put('/admin/comment/{id}', 'CommentController@update');
$router->delete('/admin/comment/{id}', 'CommentController@destroy');
