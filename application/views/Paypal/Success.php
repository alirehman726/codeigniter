<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>  
 
    <?php if(!empty($final)) { ?>
 

        <div class="wapper ml-10">

            <h1 class="success">Your Payment has been Successful!</h1>
            <h4>Payment Information</h4>
            <p><b>Reference Number: </b> <?php echo $final[0]->id; ?></p>
            <p><b>Transaction ID:</b> <?php echo $final[0]->txn_id; ?></p>
            <p><b>Paid Amount:</b> <?php echo $final[0]->payment_gross  .' '.  $final[0]->currency_code; ?></p>
            <p><b>Payment Status:</b> <?php echo $final[0]->status; ?></p>
            
            <h4>Payer Information</h4>
            <p><b>Name:</b> <?php echo $final[0]->payer_name; ?></p>
            <p><b>Email:</b> <?php echo $final[0]->payer_email; ?></p>
            
            <h4>Product Information</h4>
            <p><b>Name:</b> <?php echo $final[0]->name; ?></p>
            <p><b>Price:</b> <?php echo $final[0]->price .' '. $final[0]->currency; ?></p> 
            <a class="btn btn-primary" href="<?php echo base_url('products')?>">BACK TO PAGE</a>
            
        
        </div>
       
    <?php }else{ ?> 
        <h1 class="error">Transaction has been failed!</h1>
    <?php } ?>

</body>
</html>
