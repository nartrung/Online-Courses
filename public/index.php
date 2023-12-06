<?php

require '../bootstrap.php';
session_start();

//Sử dụng Bramus Router chỉ định đường dẫn
use Bramus\Router\Router as Router;

$router = new Router();
require(ROOTDIR . '/routes/homeRouter.php');
require(ROOTDIR . '/routes/authRouter.php');
require(ROOTDIR . '/routes/coursesRouter.php');
require(ROOTDIR . '/routes/adminRouter.php');
require(ROOTDIR . '/routes/userRouter.php');

$router->run();