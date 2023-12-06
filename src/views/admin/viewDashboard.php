<?php
use App\Models\Category;
use App\Models\Course;
use App\Models\User;

$this->layout("admin/adminDefault", ["title" => "Admin Dashboard"]) ?>
<?php $this->start("admin") ?>
<div class="row">
    <main role="main" class="col-12 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>
    </main>

</div>
<div class="row">
    <div class="col-sm-6 col-lg-4">
        <div class="card text-white bg-success m-2 mw-100">
            <div class="card-header">
                <i class="fa fa-user" style="font-size:70px; color:#fff;" aria-hidden="true"></i>
            </div>
            <div class="card-body">
                <h4 class="card-title">Tolal Users: <?=User::all()->count() ?></h4>
                <a href="/admin/users" class="btn btn-light">Details</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="card text-white bg-info m-2">
            <div class="card-header">
                <i class="fa fa-th-large" style="font-size: 70px;"></i>
            </div>
            <div class="card-body">
                <h4 class="card-title">Total Categories: <?=Category::all()->count() ?></h4>
                <a href="/admin/category" class="btn btn-light">Details</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="card text-white bg-danger m-2">
            <div class="card-header">
                <i class="fa fa-book" style="font-size:70px; color:#fff;" aria-hidden="true"></i>
            </div>
            <div class="card-body">
                <h4 class="card-title wrap">Toltal Courses: <?=Course::all()->count() ?></h4>
                <a href="/admin/courses" class="btn btn-light">Details</a>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>