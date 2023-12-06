<?php

define('VIEWS_DIR', __DIR__ . '/src/views');
define('ROOTDIR', __DIR__ . DIRECTORY_SEPARATOR);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/functions.php';

//Dùng Dotenv sử dụng các biến môi trường
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Illuminate\Database\Capsule\Manager;

//Kết nối database bằng Illuminate
$manager = new Manager();

$manager->addConnection([
	'driver'    => 'mysql',
	'host'      => $_ENV['DB_HOST'],
	'database'  => $_ENV['DB_NAME'],
	'username'  => $_ENV['DB_USER'],
	'password'  => $_ENV['DB_PASS'],
]);

$manager->setAsGlobal();
$manager->bootEloquent();