<?php $this->layout("user/userDefault", ["title" => "Login"]) ?>
<?php $this->start("page") ?>
<section class="ftco-section ">
    <div class="container-fluid" style="min-height: 87vh;">
        <div class="row py-5 my-5 " style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
            <div class=" text-center d-flex align-items-center col-md-5  text-wrap p-2 p-lg-3 col-lg-5 ml-2 ml-md-0 order-md-last rounded-right" style="background-color: rgba(40, 58, 90);">
                <div class="w-100 text-light">
                    <h2>Welcome to login</h2>
                    <p>Don't have an account?</p>
                    <a href="/register" class="btn btn-white btn-outline-light">Sign Up</a>
                </div>
            </div>
            <div class="col-md-5 offset-md-1 rounded-left text-wrap p-2 p-lg-3 mr-md-0 " style="background-color: #e2e2e2;">
                <div class="wrap">
                    <div class=" p-4 p-lg-5 ">
                        <div class="d-flex align-items-center">
                            <div class="w-100">
                                <h3 class="mb-4  text-center">Sign In</h3>
                            </div>
                        </div>
                        <form action="/login" method="POST">
                            <?php if (isset($messages['success'])) : ?>
                                <span class="help-block">
                                    <strong><?php echo ($messages['success']) ?></strong>
                                </span>
                            <?php endif ?>
                            <?php if (isset($errors['email'])) : ?>
                                <span class="help-block text-danger">
                                    <strong><?= $this->e($errors['email']) ?></strong>
                                </span>
                            <?php endif ?>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control rounded-pill" placeholder="Enter email" id="email" name="email" value="<?= isset($old['email']) ? $this->e($old['email']) : '' ?>" required>
                            </div>
                            <?php if (isset($errors['password'])) : ?>
                                <span class="help-block text-danger">
                                    <strong><?= $this->e($errors['password']) ?></strong>
                                </span>
                            <?php endif ?>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control rounded-pill" placeholder="Enter password" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-secondary">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php $this->stop() ?>