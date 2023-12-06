<?php
$router->get('/courses', 'App\Controllers\CoursesController@index');
$router->get('/search?([a-z0-9_-]+)', 'App\Controllers\CoursesController@search');
$router->post('/courses?([a-z0-9_-]+)', 'App\Controllers\CoursesController@buyCourse');