<?php $this->layout("user/userDefault", ["title" => "Register"]) ?>
<?php $this->start("page") ?>
<div class="container-fluid" style=" font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
    <div class="row justify-content-center align-items-center py-4" style="min-height: 100vh;">
        <div class="col-sm-7 col-lg-4">
            <div class="text-light py-3 rounded "style="background-color:  rgb(66, 99, 155);" >
                <h2 class="text-center">Sign Up</h2>
                <div class="panel-body ">

                    <form class="form-horizontal" role="form" method="POST" action="/register">

                        <div class="form-group">
                            <label for="name" class="col-md-8 control-label">Name</label>
                            <div class="col-12">
                                <input id="name" type="text" class="form-control rounded-pill<?php if (isset($errors['name'])) {echo "border border-danger";} ?>" name="name" value="<?= isset($old['name']) ? $this->e($old['name']) : '' ?>" required autofocus>

                                <?php if (isset($errors['name'])) : ?>
                                    <span class="help-block">
                                        <strong><?= $this->e($errors['name']) ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="email" class="col-md-8 control-label ">E-Mail Address</label>
                            <div class="col-12">
                                <input id="email" type="email" class="form-control rounded-pill <?php if (isset($errors['email'])) {echo "border border-danger";} ?>" name="email" value="<?= isset($old['email']) ? $this->e($old['email']) : '' ?>" required>

                                <?php if (isset($errors['email'])) : ?>
                                    <span class="help-block">
                                        <strong><?= $this->e($errors['email']) ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-8 control-label">Password</label>
                            <div class="col-12">
                                <input id="password" type="password" class="form-control rounded-pill <?php if (isset($errors['password'])) {echo "border border-danger";} ?>" name="password" required>

                                <?php if (isset($errors['password'])) : ?>
                                    <span class="help-block">
                                        <strong><?= $this->e($errors['password']) ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-8 control-label">Confirm Password</label>
                            <div class="col-12">
                                <input id="password-confirm" type="password" class="form-control rounded-pill <?php if (isset($errors['password_confirmation'])) {echo "border border-danger";} ?>" name="password_confirmation" required>

                                <?php if (isset($errors['password_confirmation'])) : ?>
                                    <span class="help-block">
                                        <strong><?= $this->e($errors['password_confirmation']) ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-light rounded-0">
                                    Sign Up
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        Already have a account, <a href="/login"><strong> Sign In</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>