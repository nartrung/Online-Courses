<?php

$this->layout("admin/adminDefault", ["title" => "Edit User"]) ?>
<?php $this->start("admin") ?>
<div class="row">
    <main role="main" class="col-12 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit User Details</h1>
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
        <form enctype='multipart/form-data' method="POST" action="/admin/users/edit">
            <div class="form-group">
                <input type="text" class=" d-none" name="user_id" value="<?= $user['user_id'] ?>">
            </div>
            <div class="form-group">
                <label for="user_name">User Name:</label>
                <input type="text" class="form-control" name="user_name" value="<?= $user['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="user_email">Email:</label>
                <input type="text" class="form-control" name="user_email" value="<?= $user['email'] ?>" required>
            </div>
            <div class="form-group">
                <label>Role:</label>
                <select id="is_admin" name="is_admin">
                    <?php if ($user->is_admin) :  ?>
                        <option value="1">admin</option>
                        <option value="0">user</option>
                    <?php else : ?>
                        <option value="0">user</option>
                        <option value="1">admin</option>
                    <?php endif ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" style="height:40px" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
<?php $this->stop() ?>