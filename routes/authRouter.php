<?php
$router->get('/logout', 'App\Controllers\LoginController@logout');
$router->get('/login', 'App\Controllers\LoginController@showLoginForm');
$router->post('/login', 'App\Controllers\LoginController@login');
$router->get('/register', 'App\Controllers\RegisterController@showRegisterForm');
$router->post('/register', 'App\Controllers\RegisterController@register');