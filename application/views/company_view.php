 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Css/Js -->
     <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap.min.css" />
     <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">
     <script src="<?php echo base_url(); ?>asset/jquery.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /> -->

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

     <title>Document</title>
 </head>

 <body>

     <!--HEADER  -->
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
                     <a href="<?php echo base_url('document') ?>">Document</a>
                     <a href="<?php echo base_url('dashboard/change_password'); ?>">Change Password</a>
                     <a href="<?php echo base_url('upload') ?>">Files</a>
                    <!-- <a href="<?php echo base_url('company') ?>">Company</a> -->

                 </li>
             </ul>
         </div>

         <div class="ctn1">
 

             <div class="container">
                 <br />
                 <br />
                 <br />
                 <h2 align="center">Company Data</h2><br />
                 <div class="form-group">
                     <div class="input-group">
                         <span class="input-group-addon">Search</span>
                         <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
                     </div>
                 </div>
                 <br />
                 <div id="result"></div>
             </div>
            <div style="clear:both"></div>
             <br />
             <br />
             <br />
             <br />


             </div>
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
