<?php $this->layout("user/userDefault", ["title" => "My Profile"]) ?>
<?php $this->start("page") ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center my-4">
            <h1>My profile</h1>
        </div>
        <div class="col-12 d-flex justify-content-center mt-2">
            <h3>Edit Profile</h3>
        </div>
        <form action="/profile" method="post" class="offset-4 col-4 pb-2 mb-4 border border-dark">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= \App\SessionGuard::user()->name ?>">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= \App\SessionGuard::user()->email ?>" disabled>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary w-50">Save</button>
            </div>
        </form>
    </div>
</div>
<?php $this->stop() ?>