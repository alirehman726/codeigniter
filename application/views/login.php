<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    
    <?php
        echo $this->session->flashdata('message');
    ?>

    <div class="wapper" style="padding: 3vw; ">
        <h1>User Login</h1> 

        
        <form method="post" action="<?php echo base_url('user/login'); ?>">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email :</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"> 
            </div>
    

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div> 
            <a  href="<?php echo base_url('user/forgot')?>" style="float:right">Forgot Password</a>
            <br>
            <br>

            <button type="submit"  name="save1" value="Save Data" class="btn btn-primary">LOGIN</button>
            <a class="btn btn-primary" href="<?php echo base_url('user/sign_up')?>">Sign Up</a>
        </form>

    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>



</body>
</html>