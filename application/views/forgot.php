<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Forgot Password</title>
</head>
<body>
    <?php
        echo $this->session->flashdata('message');
        $errors = $this->session->flashdata('validation_error');
    ?>

    <div class="wapper" style="padding: 3vw; ">
        <h1>Forgot Password</h1> 

        
        <form method="post" action="<?php echo base_url('user/forgot')?>">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email :</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1"> 
                <?php echo $errors['email'] ?? '' ?>
            </div>
    
 

            <button type="submit"  name="save" value="Save Data" class="btn btn-primary">SEND</button>
            <a class="btn btn-primary" href="<?php echo base_url('user/login')?>">CANCEL</a>
        </form>

    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>



</body>
</html>