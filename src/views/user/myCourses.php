<?php $this->layout("user/userDefault", ["title" => "User profile"]) ?>
<?php $this->start("page") ?>
<div class="container">
    <div class="row my-4 ">
        <div class="col-md-12 text-center">
            <h1>Welcome to my courses page!</h1>
        </div>
    </div>
</div>
<hr>
<div class="container-fluid" style="min-height: 500px;"> 
    <div class="container">
        <h5>Your courses</h5>
        <div class='courses-item d-flex flex-wrap justify-content-start' style='margin: 0 50px 0 50px'>
            <?php
            foreach ($myCourses as $courseById) :
            ?>
                <style>
                    .description {
                        overflow: hidden;
                        text-overflow: ellipsis;
                        white-space: pre;
                    }
                </style>
                <div class="card m-2" style="width: 30%;">
                    <a class="mt-2 p-2" href=""><img class="card-img-top" src="./images/courses/<?= $courseById[0]->course->img_url ?>" alt="Card image cap"></a>
                    <div class="card-body">
                        <div>
                            <span>
                                <span>
                                    Rating
                                </span>
                                <span class="float-right">
                                    <?= number_format($ratingList[$courseById[0]->course->course_id]['rate'], 2, '.', ''); ?><i class="fa-solid fa-star" style="color: #edf028;"></i> (<?= $ratingList[$courseById[0]->course->course_id]['amount'] ?>)
                                </span>
                            </span>
                        </div>
                        <div class="card-title">
                            <a class="text-dark" href="">
                                <h5><?= $courseById[0]->course["name"] ?></h5>
                            </a>
                        </div>
                        <div class="card-subtitle mb-2" id="author"><a class="text-muted font-weight-light" href=""><?= $courseById[0]->course->user->name ?></a></div>
                        <p class="card-text description"><?= $courseById[0]->course["description"] ?></p>
                        <hr>
                        <form action="/myCourses/vote" method="post" class="d-flex justify-content-center">
                            <input type="hidden" name="course_id" value="<?= $courseById[0]->course["course_id"] ?>">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="<?= $courseById[0]->course["course_id"] ?>1" value="1" <?php if (isset($courseById[0]->rating) && $courseById[0]->rating == 1) : ?> checked <?php endif; ?>>
                                <label class="form-check-label" for="<?= $courseById[0]->course["course_id"] ?>1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="<?= $courseById[0]->course["course_id"] ?>2" value="2" <?php if (isset($courseById[0]->rating) && $courseById[0]->rating == 2) : ?> checked <?php endif; ?>>
                                <label class="form-check-label" for="<?= $courseById[0]->course["course_id"] ?>2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="<?= $courseById[0]->course["course_id"] ?>3" value="3" <?php if (isset($courseById[0]->rating) && $courseById[0]->rating == 3) : ?> checked <?php endif; ?>>
                                <label class="form-check-label" for="<?= $courseById[0]->course["course_id"] ?>3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="<?= $courseById[0]->course["course_id"] ?>4" value="4" <?php if (isset($courseById[0]->rating) && $courseById[0]->rating == 4) : ?> checked <?php endif; ?>>
                                <label class="form-check-label" for="<?= $courseById[0]->course["course_id"] ?>4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="<?= $courseById[0]->course["course_id"] ?>5" value="5" <?php if (isset($courseById[0]->rating) && $courseById[0]->rating == 5) : ?> checked <?php endif; ?>>
                                <label class="form-check-label" for="<?= $courseById[0]->course["course_id"] ?>5">5</label>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Vote</button>
                        </form>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>

<?php $this->stop() ?>