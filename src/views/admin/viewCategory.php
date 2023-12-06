<?php

use App\Models\Category;

$this->layout("admin/adminDefault", ["title" => "Category"]) ?>
<?php $this->start("admin") ?>
<div class="row">
    <main role="main" class="col-12 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Caterory</h1>
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
                <th class="text-center">Category Name</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <?php foreach (Category::all() as $index => $category) : ?>
            <tr>

                <td class="text-center"><?= $index + 1 ?></td>
                <td class="text-center"><?= $category->name ?></td>
                <td class="text-center">
                    <a
                     class="btn btn-danger" style="height:40px" href="/admin/category/delete/?id=<?= $category->category_id ?>">
                        Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Trigger the modal with a button -->
    <button type="button" class="d-block btn btn-info " style="height:40px" data-toggle="modal" data-target="#myModal">
        Add Category
    </button>


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Category Item</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' action="/admin/category/add" method="POST">
                        <div class="form-group">
                            <label for="c_name">Category Name:</label>
                            <input type="text" class="form-control" name="c_name" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Category</button>
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