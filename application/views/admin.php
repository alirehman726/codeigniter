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
                    <a class="btn btn-outline-success" href="<?php echo base_url('user/login') ?>">LOGOUT</a>
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
                    
                </li>
            </ul>
        </div>
        <div class="ctn1">
            <div class="container">

                <?php
                echo $this->session->flashdata('message');
                ?>

                <div class="waaper" style="padding: 2vw;">

                    <h1>ADD User</h1>

                    <?php if (isset($result)) {
                    ?><form method="post" action="<?php echo base_url('admin/update'); ?>">
                    <?php
                    } else {
                        ?><form method="post" action="<?php echo base_url('admin/savedata'); ?>"><?php
                    } ?>
                            <form method="post" action="savedata" enctype="multipart/form-data">
                                <?php
                                if (isset($result[0]->id)) {
                                ?><input type="hidden" name="id" id="id" value="<?php echo $result[0]->id ?>"><?php } ?>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputPassword1" required value="<?php echo $result[0]->name ?? ''; ?>" />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputPassword1" required value="<?php echo $result[0]->email ?? ''; ?>" />
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" required value="<?php echo $result[0]->password ?? ''; ?>" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                                        <input type="phone" name="phone" class="form-control" id="exampleInputEmail1" maxlength="10" minlength="10" required aria-describedby="emailHelp" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="<?php echo $result[0]->phone ?? ''; ?>" />
                                    </div>

                                    <!-- <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">User Type</label>
                                        <input type="text" name="user_type" class="form-control" id="exampleInputEmail1" required value="<?php echo $result[0]->user_type ?? ''; ?>">
                                    </div> -->

                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                        <select class="form-select" id="inputGroupSelect01" name="user_type">
                                            <option selected value="<?php echo $result[0]->user_type ?? ''; ?>">Select User Type</option>
                                            <option value="1">1</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>


                                    <button type="submit" name="save" value="Save Data" class="btn btn-primary">Submit</button>
                            </form>

                </div>

                <?php if (isset($data)) { ?>


                    <div class="waaper2" style="padding: 2vw;">
                        <table width="600" border="1" cellspacing="5" cellpadding="5">
                            <tr style="background:#CCC">
                                <!-- <th>Id</th>  -->
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Phone</th>
                                <th>User Type</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            <?php
                            // $i = 1;
                            foreach ($data as $row) {
                                echo "<tr>";
                                // echo "<td>" . $i . "</td>";
                                echo "<td>" . $row->name . "</td>";
                                echo "<td>" . $row->email . "</td>";
                                echo "<td>" . $row->password . "</td>";
                                echo "<td>" . $row->phone . "</td>";
                                echo "<td>" . $row->user_type . "</td>";
                                echo "<td> <a class= 'btn btn-primary' href = '" . base_url('admin/getEditdata/' . $row->id) . "'> UPDATE </a> </td>";
                                echo "<td>  <a class= 'btn btn-primary' href = '" . base_url('admin/deletedata1/' . $row->id) . "'> DELETE</a> </td>";
                                echo "</tr>";
                                // $i++;
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

 