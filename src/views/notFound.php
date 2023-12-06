<?php $this->layout("user/userDefault", ["title" => "404 Not Found"]) ?>
<?php $this->start("page") ?>
<div class="container ">
    <div class="row text-center align-items-center vh-100" >
        <div class="col-md-12">
        <h2>OOPS! PAGE NOT FOUND</h2>
        <p style="font-size: 150px; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">404</p>
        <h1>THE PAGE YOU ARE LOOKING FOR CAN'T BE FOUNDED</h1>
        <a href="/" class="btn btn-success btn-lg" role="button">GO BACK TO HOME PAGE</a>
        </div>
    </div>
</div>
<?php $this->stop() ?>