<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">
    <title>Change Password</title>
</head>

<body>
 
    <!-- HEADER  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <form class="d-flex">
                    <a class="btn btn-outline-success" href="<?php echo base_url('user/logout') ?>">LOGOUT</a>
                </form>
            </div>
        </div>
    </nav>

    <!-- SideBar -->
    <div class="wapper">
        <div class="ctn">
            <ul>
                <li>
                    <?php
                       if($_SESSION['user']['user_type'] == 1){
                           ?>
                            <a href="<?php echo base_url()?>">Dashboard</a>
                            <a href="<?php echo base_url('excel_import') ?>">Import Excel</a>
                            <a href="<?php echo base_url('excel_export') ?>">Export Excel</a>
                            <a href="<?php echo base_url('admin') ?>">Add User</a>
                           
                           <?php
                       }
                       ?>
                    <a href="<?php echo base_url('document')?>">Document</a>
                    <a href="<?php echo base_url('dashboard/change_password'); ?>">Change Password</a>
                    <a href="<?php echo base_url('upload')?>">Files</a>
                     <!-- <a href="<?php echo base_url('company') ?>">Company</a>                     -->


                </li>
            </ul>
        </div>
        <div class="ctn1">
            <div class="container">

                <div class="container box">

                    <?php
                    echo $this->session->flashdata('message');
                    $errors = $this->session->flashdata('validation_error');
                    ?>

                    <?php echo form_open('dashboard/change_pass_submit') ?>
                    <div class="wapper" style="padding: 3vw; ">
                        <div>
                            <h1>Change password</h1>

                            <label for="exampleInputEmail1" class="form-label">New Password :</label>
                            <?php echo form_password(['name' => 'newpass', 'id' => 'inputPassword', 'placeholder' => 'New Password']); ?>
                            <?php echo $errors['newpass'] ?? '' ?>
                            <br>

                            <label for="exampleInputEmail1" class="form-label">Confirm Password :</label>
                            <?php echo form_password(['name' => 'confpassword', 'id' => 'inputPassword', 'placeholder' => 'Password Confirmation']); ?>
                            <?php echo $errors['confpassword'] ?? '' ?>
                            <br>

                            <br>
                            <?php echo form_submit(['name' => 'submit', 'value' => 'update Password']); ?>
                            <?php echo form_close(); ?>
                            <br>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>



</body>

</html>