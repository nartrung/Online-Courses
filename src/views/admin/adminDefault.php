<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->e($title) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="container-fluid navbar navbar-dark sticky-top bg-light flex-md-nowrap p-0 shadow">
        <div class="container">
            <button class="navbar-toggler position-absolute d-md-none collapsed bg-dark" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class=" d-none d-md-block text-dark col-md-3 col-lg-2 mr-0 px-3" href="/admin"><strong>ADMIN PAGE</strong></a>
            <ul class="navbar-nav ml-auto p-2">
                <li class="nav-item text-nowrap">
                    Hello, <strong><?= $this->e(\App\SessionGuard::user()->name) ?></strong>
                    <a class="btn btn-danger active ml-2" role="button" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row ">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3 ">
                    <ul class="nav flex-column ">
                        <li class="nav-item py-2">
                            <a class="btn btn-primary rounded-pill nav-link font-weight-bold" href="/">
                                <span class="">Home page</span>
                            </a>
                        </li>
                        <li class="nav-item py-2">
                            <a class="btn btn-secondary rounded-pill nav-link font-weight-bold" href="/admin">
                                <span class="">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item py-2">
                            <a class="btn btn-success rounded-pill nav-link font-weight-bold" href="/admin/users">
                                <span>Users</span>

                            </a>
                        </li>
                        <li class="nav-item py-2">
                            <a class="btn btn-info rounded-pill nav-link font-weight-bold" href="/admin/category">
                                <span>Category</span>
                            </a>
                        </li>
                        <li class="nav-item py-2">
                            <a class="btn btn-danger rounded-pill nav-link font-weight-bold" href="/admin/courses">
                                <span>Courses</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>
            <div class="col-md-9 ml-sm-auto col-lg-10">
                <?= $this->section("admin") ?>
            </div>
        </div>
    </div>

</body>

</html>