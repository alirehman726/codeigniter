
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">
    <title>Document</title>
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

                    <?php if (isset($_SESSION['document']['doc_type']) && $_SESSION['document']['doc_type'] == 1) { 
                        if ($_SESSION['user']['user_type'] == 0) { ?>
                            <input class="form-control me-2" type="text" name="search_text" id="search_text" placeholder="Search" aria-label="Search">
                        <?php } ?>

                    <?php }?>

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

                    if ($_SESSION['user']['user_type'] == 1) { ?>

                        <a href="<?php echo base_url() ?>">Dashboard</a>
                        <a href="<?php echo base_url('excel_import') ?>">Import Excel</a>
                        <a href="<?php echo base_url('excel_export') ?>">Export Excel</a>
                        <a href="<?php echo base_url('admin') ?>">Add User</a>

                    <?php } ?>

                    <a href="<?php echo base_url('document') ?>">Document</a>
                    <a href="<?php echo base_url('dashboard/change_password'); ?>">Change Password</a>
                    <a href="<?php echo base_url('upload') ?>">Files</a>
                    <!-- <a href="<?php echo base_url('company') ?>">Company</a> -->

                </li>
            </ul>
        </div>
        <div class="ctn1 p-5">
            <?php
            echo $this->session->flashdata('message');
            ?>
            <?php echo form_open_multipart('document/create');
            if ($_SESSION['user']['user_type'] == 1) { ?>
                <!-- if ($_SESSION['user']['user_type'] == 1) { ?> -->

                <lable for="varchar"> Upload File</lable>
                <input type="file" name="filename" class="mb-3">
                <br>
                <button type="submit" class="btn btn-primary ">Upload</button>

            <?php echo form_close();
            } ?>

            <?php if (isset($data)) {  ?>
                <div class="waaper2" style="padding: 2vw;">
                    <?php

                        // pre($_SESSION);
                        if (!$this->session->userdata('user')) {
                            redirect('user/login');
                        }

                        if ($_SESSION['user']['user_type'] == 0) { ?>
                            <a href='<?php echo  base_url('document/buy/' . $data[0]->id); ?>' class="btn btn-primary mb-3">PAY</a>
                        <?php } ?>

                        <table width="200" border="1" cellspacing="20" cellpadding="20">
                            <tr style="background:#CCC">
                                <th>ID</th>
                                <th>File Name</th>
                                <th>Price</th>
                                <?php if (isset($_SESSION['document']) && $_SESSION['document']['doc_type'] == 1) { ?>
                                    <th>View</th>
                                <?php } ?>
                                <?php

                                if ($_SESSION['user']['user_type'] == 1) { ?>
                                    <th>Export</th>
                                    <th>Delete</th>
                                <?php } ?>
                            </tr>

                            <?php

                            if ($data == null) { ?>
                                <tr>
                                    <td colspan="4" style="text-align:center">No record found</td>
                                </tr>
                            <?php } ?>
                            <?php
                            foreach ($data as $row) { ?>
                                <tr>
                                    <td> <?php echo $row->id  ?> </td>
                                    <td> <?php echo $row->filename ?> </td>
                                    <td> <?php echo $row->price ?> </td>

                                    <?php if (isset($_SESSION['document']) && $_SESSION['document']['doc_type'] == 1) { ?>

                                        <td> <a class='btn btn-primary' href="<?php echo base_url() . 'Document/viewpdf/' . $row->filename; ?>"> VIEW</a></td>
                                    <?php } ?>
                                    <?php
                                    if ($_SESSION['user']['user_type'] == 1) { ?>
                                        <td> <a class='btn btn-success' href="<?php echo base_url() .'Document/exportpdf/' . $row->id; ?>"> EXPORT </a> </td>
                                        <td> <a class='btn btn-danger' href="<?php echo base_url('document/deletedata1/' . $row->id), 'refresh' ?> "> DELETE</a> </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </table>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['document']['doc_type']) && $_SESSION['document']['doc_type'] == 1) {?>
            <div class="container">
                 <br/>
                 <br/>
                 <br/>
                 <!-- <h2 align="center">Company Data</h2><br/> -->
                <!-- <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Search</span>
                        <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control"/>
                    </div>
                </div> -->
                 <br/>
                 <div id="result"></div>
             </div>
            <div style="clear:both"></div>
             <br/>
             <br/>
             <br/>
             <br/>
            <?php }?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>
 

<script>
$(document).ready(function(){

 load_data();

 function load_data(query){
  $.ajax({
   url:"<?php echo base_url(); ?>company/fetch",
   method:"POST",
   data:{query:query},
   success:function(data){
       $('#result').html(data);
   }
  })
 }

 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});


 
</script>
