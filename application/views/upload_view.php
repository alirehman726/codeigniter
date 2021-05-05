<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">
  <title>Upload File</title>
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

        <?php
        echo $this->session->flashdata('message');
        $errors = $this->session->flashdata('error');
        ?>

        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="mt-5">Upload Form</h1>

              <?php echo form_open_multipart('Upload/do_upload'); ?>
              <input type="file" name="customFile" class="form-control mt-5">
              <?php echo $errors['customFile'] ?? '' ?>
              <input type="submit" name="submit" class="btn btn-primary mt-5">
              </form>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>

 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>