<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->e($title) ?></title>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-fluid fixed-top px-0 shadow" style="background-color: rgba(40, 58, 90, 0.98) !important; ">
        <nav class="container navbar navbar-expand-lg navbar-dark ">
            <a class="navbar-brand" href="/"><img src="./images/Logo.png" alt="" height="30px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form action="/search" class="form-inline my-2 my-lg-0 ">
                    <input class="form-control" id="name" name="name" type="text" placeholder="Please enter course name..." aria-label="Search" size="50">
                    <button class="text-light btn my-2 my-sm-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                </form>
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item active mx-2">
                        <a class="nav-link" href="/courses">Courses</a>
                    </li>
                    <?php if (!\App\SessionGuard::isUserLoggedIn()) : ?>
                        <li class="nav-item active mx-2">
                            <a class="nav-link btn btn-outline-light" href="/login">Login </a>
                        </li>
                        <li class="nav-item active mx-2">
                            <a class="nav-link btn btn-outline-light" href="/register">Register</a>
                        </li>

                    <?php else : ?>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                <?= $this->e(\App\SessionGuard::user()->name) ?>

                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <?php if (\App\SessionGuard::isAdmin()) : ?>
                                    <a class="dropdown-item" href="/admin">Admin Dashboard</a>
                                <?php endif ?>
                                <a class="dropdown-item" href="/myCourses">My learning</a>
                                <a class="dropdown-item" href="/profile">Edit profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">Logout</a>
                            </div>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </nav>
    </div>
    <?= $this->section("page") ?>
    <footer class="text-center text-lg-start text-dark border-top">
        <div class="container-fluid">
            <section class="d-flex justify-content-between p-4 text-white ">
                <div class="me-5">
                </div>
            </section>
            <section>
                <div class="container text-md-start">
                    <div class="row">
                        <div class="<?php if (!\App\SessionGuard::isUserLoggedIn()) : ?>col-sm-6 col-lg-4 mb-4 <?php else : ?> d-none <?php endif ?> text-center">
                            <h6 class="text-uppercase fw-bold">Account</h6>
                            <hr class="mx-auto" style="width: 60px; background-color: #019ABD; height: 2px" />
                            <p><a href="/login" class="text-dark text-decoration-none">Login</a></p>
                            <p><a href="/register" class="text-dark text-decoration-none">Register</a></p>
                        </div>
                        <div class="<?php if (!\App\SessionGuard::isUserLoggedIn()) : ?>col-sm-6 col-lg-4 mb-4 <?php else : ?> offset-1 col-5 <?php endif ?> text-center">
                            <h6 class="text-uppercase fw-bold">Courses</h6>
                            <hr class="mx-auto" style="width: 60px; background-color: #019ABD; height: 2px" />
                            <p><a href="/search?name=Python" class="text-dark text-decoration-none">Python</a></p>
                            <p><a href="/search?name=Java" class="text-dark text-decoration-none">Java</a></p>
                            <p><a href="/search?name=C#" class="text-dark text-decoration-none">C#</a></p>
                            <p><a href="/search?name=C++" class="text-dark text-decoration-none">C/C++</a></p>
                        </div>
                        <div class="<?php if (!\App\SessionGuard::isUserLoggedIn()) : ?>col-sm-6 col-lg-4 mb-md-0 mb-4 <?php else : ?> col-5 <?php endif ?> text-center">
                            <h6 class="text-uppercase fw-bold">About Us</h6>
                            <hr class="mx-auto" style="width: 60px; background-color: #019ABD; height: 2px" />
                            <p><a href="https://github.com/22-23Sem2-Courses/ct27501-project-nartrung" target="_blank"><i style="font-size: 40px" class="fa-brands fa-github text-dark"></i></a></p>
                            <p><a href="https://www.facebook.com/narTrung/" target="_blank"><i style="font-size: 40px" class="fa-brands fa-facebook"></i></a></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="container-fluid py-4" style="background-color: rgba(40, 58, 90, 0.9);">
            <div class="container">
                <div class="row text-light">
                    &copy; Copyright <strong>CODEMY</strong>. All Rights Reserved
                </div>
            </div>
        </div>
    </footer>
</body>

</html>