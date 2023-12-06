<?php
//Khi đi đến đường dẫn không hợp lệ sẽ dẫn đén trang NOT FOUND
$router->set404('\App\Controllers\HomeController@notFound');
$router->get('/', 'App\Controllers\HomeController@index');
