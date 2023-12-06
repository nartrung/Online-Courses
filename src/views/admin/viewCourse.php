<?php

use App\Models\Category;
use App\Models\Course;

$this->layout("admin/adminDefault", ["title" => "Courses"]) ?>
<?php $this->start("admin") ?>
<div class="row">
    <main role="main" class="col-12 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Courses</h1>
        </div>
    </main>

</div>
<div class="row px-4">
    <?php if (isset($errors)) : ?>
        <h5 class="text-danger">
            <?= $this->e($errors) ?>
        </h5>
    <?php endif ?>
    <?php if (isset($messages)) : ?>
        <h5 class="text-success">
            <?= $this->e($messages) ?>
        </h5>
    <?php endif ?>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">SN</th>
                <th class="text-center">Category</th>
                <th class="text-center">Course Name</th>
                <th class="text-center">Price</th>
                <th class="text-center">Image</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <?php foreach (Course::all() as $index => $course) : ?>
            <tr>

                <td class="text-center"><?= $index + 1 ?></td>
                <td class="text-center"><?= $course->category->name ?></td>
                <td class="text-center"><?= $course->name ?></td>
                <td class="text-center"><?= $course->price ?></td>
                <td class="text-center"> <img src="../images/courses/<?= $course->img_url ?>" alt="" width="80px"> </td>
                <td class="text-center">
                    <a class="btn btn-primary" style="height:40px" href="/admin/courses/edit/?id=<?= $course->course_id ?>">
                        Edit
                    </a>
                    <a class="btn btn-danger" style="height:40px" href="/admin/courses/delete/?id=<?= $course->course_id ?>">
                        Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <!-- Trigger the modal with a button -->
    <button type="button" class="d-block btn btn-info " style="height:40px" data-toggle="modal" data-target="#myModal">
        Add Course
    </button>


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Course Item</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' action="/admin/courses/add" method="POST">
                        <div class="form-group">
                            <label for="course_name">Course Name:</label>
                            <input type="text" class="form-control" name="course_name" required>
                        </div>
                        <div class="form-group">
                            <label for="course_price">Price($):</label>
                            <input type="number" step="0.01" class="form-control" name="course_price" required>
                        </div>
                        <div class="form-group">
                            <label for="course_desc">Description:</label>
                            <input type="text" class="form-control" name="course_desc" required>
                        </div>
                        <div class="form-group">
                            <label>Category:</label>
                            <select id="category" name="category_id">
                                <option disabled selected>Select category</option>
                                <?php foreach (Category::all() as $category) : ?>
                                    <option class="text-dark" value="<?= $category->category_id ?>"><?= $category->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">Select image to upload:
                            <input type="file" name="course_img" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" name="addCourse" style="height:40px">Add Course</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
                </div>
            </div>

        </div>


    </div>

</div>
<?php $this->stop() ?>