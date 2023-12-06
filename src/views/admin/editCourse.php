<?php

use App\Models\Category;

$this->layout("admin/adminDefault", ["title" => "Edit Courses"]) ?>
<?php $this->start("admin") ?>
<div class="row">
    <main role="main" class="col-12 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Course Details</h1>
        </div>
    </main>
</div>
<div class="row px-4">
    <?php if (isset($errors)) : ?>
        <h5 class="text-danger">
            <?= $this->e($errors) ?>
        </h5>
    <?php endif ?>
    <div class="col">
        <form enctype='multipart/form-data' method="POST" action="/admin/courses/edit">
            <div class="form-group">
                <input type="text" class=" d-none" name="course_id" value="<?= $course['course_id'] ?>">
            </div>
            <div class="form-group">
                <label for="course_name">Course Name:</label>
                <input type="text" class="form-control" name="course_name" value="<?= $course['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="course_price">Price($):</label>
                <input type="number" step="0.01" class="form-control" name="course_price" value="<?= $course['price'] ?>" required>
            </div>
            <div class="form-group">
                <label for="course_desc">Description:</label>
                <input type="text" class="form-control" name="course_desc" value="<?= $course['description'] ?>" required>
            </div>
            <div class="form-group">
                <label>Category:</label>
                <select id="category" name="category_id">
                    <?php
                    $category = Category::find($course['category_id']);
                    ?>
                    <option value="<?= $course['category_id'] ?>"><?= $category['name'] ?></option>
                    <?php foreach (Category::all()->except($category['category_id']) as $category) : ?>
                        <option class="text-dark" value="<?= $category->category_id ?>"><?= $category->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <img width='200px' height='150px' src="../../../images/courses/<?= $course['img_url'] ?>">
                <div class="py-2">
                    <label for="file">Choose Image:</label>
                    <input type="file" name="course_img">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" style="height:40px" class="btn btn-primary">Update Item</button>
            </div>
        </form>
    </div>
</div>
<?php $this->stop() ?>