<?php

use App\Models\User;

$this->layout("admin/adminDefault", ["title" => "Users"]) ?>
<?php $this->start("admin") ?>
<div class="row">
    <main role="main" class="col-12 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users</h1>
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
                <th class="text-center">ID</th>
                <th class="text-center">User Name</th>
                <th>Email</th>
                <th class="text-center">Role</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <?php foreach (User::all() as $user) : ?>
            <tr>

                <td class="text-center"><?= $user->user_id ?></td>
                <td class="text-center"><?= $user->name ?></td>
                <td><?= $user->email ?></td>
                <td class="text-center">
                    <?php if ($user->is_admin) :  ?>
                        Admin
                    <?php else : ?>
                        User
                    <?php endif ?>
                </td>
                <td class="text-center">
                    <a class="btn btn-primary" style="height:40px" href="/admin/users/edit/?id=<?= $user->user_id ?>">
                        Edit
                    </a>
                    <a class="btn btn-danger" style="height:40px" href="/admin/users/delete/?id=<?= $user->user_id ?>">
                        Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php $this->stop() ?>