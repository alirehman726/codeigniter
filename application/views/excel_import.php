<!doctype html>
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

  <title>Import Excel</title>
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

        <div class="container">

          <h1 align="center">Import Excel File...!</h1>
          <form action="<?php echo base_url('excel_import/fetch'); ?>" method="post" id="import_form" enctype="multipart/form-data">
            <p>Select Excel File
              <input type="file" name="file" id="file" required accept=".xls, .xlsx, .pdf">
            </p>
            <input type="submit" name="import" value="Import" class="btn btn-primary">
          </form>

          <br />

          <div class="table-responsive" id="customer_data">
            <!-- <h3 align="center">Total Data - '.$data->num_rows().'</h3> -->
            <table class="table table-striped table-bordered">
              <tr>
                <th>Customer Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Postal Code</th>
                <th>Country</th>
              </tr>
              <?php
              if ($data == null) {
              ?><tr>
                  <td colspan="5" style="text-align:center">No record found</td>
                </tr><?php
                    } else {
                      foreach ($data as $row) { ?>
                  <tr>
                    <td><?php echo $row['CustomerName'] ?></td>
                    <td><?php echo $row['Address'] ?></td>
                    <td><?php echo $row['City'] ?></td>
                    <td><?php echo $row['PostalCode'] ?></td>
                    <td><?php echo $row['Country'] ?></td>
                  </tr>

              <?php }
                    } ?>
            </table>

          </div>

        </div>

      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>