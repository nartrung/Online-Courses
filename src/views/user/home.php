<?php $this->layout("user/userDefault", ["title" => "Home Page"]) ?>
<?php $this->start("page") ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="first-slide" src="./images/carousel/slide1.png" alt="First slide" width="100%" height="100%">
        </div>
        <div class="carousel-item">
            <img class="second-slide" src="./images/carousel/slide2.png" alt="Second slide" width="100%" height="100%">
        </div>
        <div class="carousel-item">
            <img class="third-slide" src="./images/carousel/slide3.png" alt="Third slide" width="100%" height="100%">
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="jumbotron my-5">
    <h1 class="display-4">From <strong>Hello, world!</strong> to <strong>Master</strong></h1>
    <p class="lead">Our courses will help you become a better programmer.</p>
    <hr class="my-4">
    <p>Please follow these courses to get started.</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="/courses" role="button">Learn more...</a>
    </p>
</div>
<div class="container">
    <h2>NEWEST COURSES</h2>
    <div class="row">
        <?php foreach ($newest as $course) : ?>
            <style>
                .description {
                    overflow: hidden;
                    text-overflow: ellipsis;
                    white-space: pre;
                }
            </style>
            <div class="card m-2 shadow mb-5 bg-white col-sm-5 col-md-4 col-lg-3">
                <a class="mt-2 p-2" href="/courses"><img class="card-img-top" src="./images/courses/<?= $course->img_url ?>" alt="Card image cap"></a>
                <div class="card-body">
                    <div class="card-title"><a class="text-dark" href="">
                            <h5><?= $course->name ?></h5>
                        </a></div>
                    <p class="card-text description pt-auto"><?= $course->description ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php $this->stop() ?>