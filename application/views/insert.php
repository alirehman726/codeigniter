 <!doctype html>
 <html lang="en">

 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
     <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">
     
     <title>Insert Data!</title>
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
                     <!-- <a href="<?php echo base_url('company') ?>">Company</a> -->



                     
                    
                 </li>
             </ul>
         </div>
         <div class="ctn1">
             <div class="container">

                 <?php
                    echo $this->session->flashdata('message');
                    ?>

                 <div class="waaper" style="padding: 2vw;">


                     <?php if (isset($result)) {
                        ?><form method="post" action="<?php echo base_url('update'); ?>"><?php
                                                                            } else {
                                                                                ?><form method="post" action="<?php echo base_url('crud/savedata'); ?>"><?php
                                                                                                                                                } ?>
                             <form method="post" action="savedata">
                                 <div class="mb-3">
                                     <label for="exampleInputPassword1" class="form-label">First Name</label>
                                     <input type="text" name="first_name" class="form-control" id="exampleInputPassword1" required value="<?php echo $result[0]->first_name ?? ''; ?>" />
                                 </div>
                                 <?php
                                    if (isset($result[0]->id)) {
                                    ?><input type="hidden" name="id" id="id" value="<?php echo $result[0]->id ?>"><?php
                                                                                                    }

                                                                                                        ?>
                                 <div class="mb-3">
                                     <label for="exampleInputPassword1" class="form-label">Last Name</label>
                                     <input type="text" name="last_name" class="form-control" id="exampleInputPassword1" required value="<?php echo $result[0]->last_name ?? ''; ?>" />
                                 </div>
                                 <div class="mb-3">
                                     <label for="exampleInputEmail1" class="form-label">Email</label>
                                     <input type="email" name="email" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp" value="<?php echo $result[0]->email ?? ''; ?>" />
                                 </div>
                                 <button type="submit" name="save" value="Save Data" class="btn btn-primary">Submit</button>
                             </form>

                 </div>

                 <?php if (isset($data)) { ?>


                     <div class="waaper2" style="padding: 2vw;">
                         <table width="600" border="1" cellspacing="5" cellpadding="5">
                             <tr style="background:#CCC">
                                 <th>Id</th>
                                 <th>First_name</th>
                                 <th>Last_name</th>
                                 <th>Email Id</th>
                                 <th>Update</th>
                                 <th>Delete</th>
                             </tr>
                             <?php
                                $i = 1;
                                foreach ($data as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $i . "</td>";
                                    echo "<td>" . $row->first_name . "</td>";
                                    echo "<td>" . $row->last_name . "</td>";
                                    echo "<td>" . $row->email . "</td>";
                                    echo "<td> <a class= 'btn btn-primary' href = '" . base_url('editdata/' . $row->id) . "'> UPDATE </a> </td>";
                                    echo "<td>  <a class= 'btn btn-primary' onclick = 'ConfirmDelete'  href = '" . base_url('deletedata/' . $row->id) . "'> DELETE</a> </td>";
                                    echo "</tr>";
                                    $i++;
                                }
                                ?>
                         </table>
                     </div>

                 <?php } ?>

             </div>
         </div>
     </div>


 

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


 </body>

 </html>    

<script>

function ConfirmDelete() {
    var x = confirm('Are you sure to delete');
    if (x) {
        return true;
    } else {
        return false;
    }
}


</script>