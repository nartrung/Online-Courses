<?php
$this->layout("user/userDefault", ["title" => "$title"]) ?>
<?php $this->start("page") ?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-12 text-center mt-2">
            <h1><?= $pageContent ?></h1>
        </div>
    </div>
</div>
<hr>
<div class='d-flex justify-content-center align-items-center' style='height:500px; <?php if(count($courses) != 0) echo 'display:none!important;'?>'><h3>Could not find your search courses</h3></div>
<?php $category = ""; // category name
?>
<?php
foreach ($courses as $coursesByCategory) : //category group
    foreach ($coursesByCategory as $course) : //course in category group
        if ($category != $coursesByCategory[0]['category']->name) {
            if ($category != "") echo "</div>";
            $category = $coursesByCategory[0]['category']->name;
            echo "<h5 style='margin: 0 50px 10px 50px'>$category</h5>";
            echo "<div class='courses-item d-flex flex-wrap' style='margin: 0 50px 0 50px'>";
        }
?>
        <style>
            .description {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: pre;
            }
        </style>
        <div class="card m-2 shadow mb-5 bg-white col-sm-6 col-md-4 col-lg-3">
            <a class="mt-2 p-2" href=""><img class="card-img-top" src="./images/courses/<?= $course->img_url ?>" alt="Card image cap"></a>
            <div class="card-body">
                <div>
                    <span>
                        <span>
                            Rating
                        </span>
                        <span class="float-right">
                            <?= number_format($ratingList[$course->course_id]['rate'], 2, '.', ''); ?><i class="fa-solid fa-star" style="color: #edf028;"></i> (<?= $ratingList[$course->course_id]['amount'] ?>)
                        </span>
                    </span>
                </div>
                <div class="card-title"><a class="text-dark" href="">
                        <h5><?= $course["name"] ?></h5>
                    </a></div>
                <div class="card-subtitle mb-2" id="author"><p class="text-muted font-weight-light">Author: <?= $course->user->name ?></p></div>
                <p class="card-text description"><?= $course["description"] ?></p>
                <hr>
                <div class="d-flex justify-content-between">
                    <span>
                        <form action="/courses" method="post">
                            <input type="hidden" name="course_id" value="<?= $course['course_id'] ?>" />
                            <button class="btn btn-primary" type="submit" <?php if (\App\Models\Bought::isBought($course['course_id'])) echo 'disabled' ?>><?php if (\App\Models\Bought::isBought($course['course_id'])) echo "In your course"; else echo "Buy now"; ?></button>
                        </form>
                    </span>
                    <span class="text-primary align-self-end"><?php echo number_format($course["price"], 2, '.', ''); ?>$</span>
                </div>
            </div>
        </div>
    <?php
    endforeach;
    ?>
<?php endforeach; ?>
</div>
<?php $this->stop() ?>