<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <title>Register</title>
</head>
<body>
    

    <?php
        echo $this->session->flashdata('message');
        $errors = $this->session->flashdata('validation_error');
    ?>

    <div class="wapper" style="padding: 3vw; ">
        <h1>User Register</h1> 

        
        <form method="post" action="<?php echo base_url('user/sign_up');?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name :</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?php echo set_value('name'); ?>" required> 
                <?php if(isset($errors['name'])) { ?>
                    <span><?php echo $errors['name'] ?></span>
                <?php }?>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email :</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo set_value('email'); ?>" required> 

                <?php if (isset($errors['email'])) { ?>
                    <span><?php echo $errors['email']?></span>

                <?php }?>

            </div>
    

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?php echo set_value('password'); ?>" required>

                <?php if (isset($errors['password'])) {?>
                    <span><?php echo $errors['password']?></span>
                <?php }?>

            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" name="conf_password" class="form-control" id="exampleInputConfirmPassword1" value="<?php echo set_value('conf_password'); ?>" required>
                <?php  if(isset($errors['conf_password'])){ ?>
                    <span style="color: red;"><?php echo $errors['conf_password']; ?></span>
                <?php } ?>
            </div>
 

            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone :</label>
                <input type="phone" name="phone" class="form-control" id="phone" maxlength="10" value="<?php echo set_value('phone'); ?>" required onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">

                <?php if(isset($errors['phone'])) { ?>
                    <span><?php echo $errors['phone']?></span>
                <?php }?>

            </div>



            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LejkWUaAAAAAFSA-s-XvjVpk6FXSybh82jGV072" required></div>
            </div>





            <button type="submit"  name="save" value="Save Data" class="btn btn-primary">Submit</button>
            <a  class="btn btn-primary" style="" href="<?php echo base_url('user/login'); ?>">Login Here</a>
        </form>

    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>








 