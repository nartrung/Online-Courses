<?php

$router->get('/myCourses', 'App\Controllers\UserController@myCourses');
$router->post('/myCourses/vote', 'App\Controllers\UserController@vote');
$router->get('/profile', 'App\Controllers\UserController@myProfile');
$router->post('/profile?([a-z0-9_-]+)', 'App\Controllers\UserController@updateProfile');