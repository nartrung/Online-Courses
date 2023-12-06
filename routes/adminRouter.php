<?php
$router->get('/admin', 'App\Controllers\AdminController@index');

$router->get('/admin/category', 'App\Controllers\AdminCategoryController@viewCategory');
$router->post('/admin/category/add', 'App\Controllers\AdminCategoryController@addCategory');
$router->get('/admin/category/delete?(/\[a-z0-9_-]+)?', 'App\Controllers\AdminCategoryController@deleteCategory');


$router->get('/admin/courses', 'App\Controllers\AdminCourseController@viewCourse');
$router->post('/admin/courses/add', 'App\Controllers\AdminCourseController@addCourse');
$router->post('/admin/courses/edit', 'App\Controllers\AdminCourseController@editCourse');
$router->get('/admin/courses/delete?(/\[a-z0-9_-]+)?', 'App\Controllers\AdminCourseController@deleteCourse');
$router->get('/admin/courses/edit?(/\[a-z0-9_-]+)?', 'App\Controllers\AdminCourseController@viewEditCourse');

$router->get('/admin/users', 'App\Controllers\AdminUserController@viewUser');
$router->post('/admin/users/edit', 'App\Controllers\AdminUserController@editUser');
$router->get('/admin/users/delete?(/\[a-z0-9_-]+)?', 'App\Controllers\AdminUserController@deleteUser');
$router->get('/admin/users/edit?(/\[a-z0-9_-]+)?', 'App\Controllers\AdminUserController@viewEditUser');
