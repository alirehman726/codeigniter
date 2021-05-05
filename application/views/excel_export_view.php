<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Css/Js -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">
    <script src="<?php echo base_url(); ?>asset/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Export Excel</title>
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
                    if ($_SESSION['user']['user_type'] == 1) {
                        ?>
                        <a href="<?php echo base_url() ?>">Dashboard</a>
                        <a href="<?php echo base_url('excel_import') ?>">Import Excel</a>
                        <a href="<?php echo base_url('excel_export') ?>">Export Excel</a>
                        <a href="<?php echo base_url('admin') ?>">Add User</a>

                    <?php
                    }
                    ?>
                    <a href="<?php echo base_url('document')?>">Document</a>
                    <a href="<?php echo base_url('dashboard/change_password'); ?>">Change Password</a>
                    <a href="<?php echo base_url('upload') ?>">Files</a>
                     <!-- <a href="<?php echo base_url('company') ?>">Company</a> -->

                     
                    <!-- <a href="<?php echo base_url() ?>">Dashboard</a>
                    <a href="<?php echo base_url('dashboard/change_password'); ?>">Change Password</a>
                    <a href="<?php echo base_url('upload') ?>">Files</a>
                    <a href="<?php echo base_url('excel_import') ?>">Import Excel</a>
                    <a href="<?php echo base_url('excel_export') ?>">Export Excel</a>
                    <a href="<?php echo base_url('admin') ?>">Add User</a> -->
                </li>
            </ul>
        </div>
        <div class="ctn1">
            <div class="container">

                <div class="container box">

                    <h3 align="center"> Export Data in Excel</h3>
                    <br />
                    <div class="table-responsive">
                        <table class="table table-boardered">

                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Designation</th>
                                <th>Age</th>
                            </tr>
                            <?php

                            foreach ($employee_data as $row) { ?>

                                <tr>
                                    <td><?php echo $row->name ?></td>
                                    <td><?php echo $row->address ?></td>
                                    <td><?php echo $row->gender ?></td>
                                    <td><?php echo $row->designation ?></td>
                                    <td><?php echo $row->age ?></td>

                                </tr>

                            <?php  }  ?>

                        </table>

                        <div align="center">
                            <form action="<?php echo base_url('excel_export/action') ?>" method="post">
                                <input type="submit" name="export" class="btn btn-success" value="Export" />
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>



</body>

</html>