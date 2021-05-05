<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
  
    <!-- List all products -->
    <?php if(!empty($products)){ 
        foreach($products as $row){ ?>
            <div class="card">
                <img src="<?php echo base_url('assets/images/'.$row['image']); ?>" />
                <div class="card-body">
                    <h3 class="card-title"><?php echo $row['name']; ?></h3>
                    <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <h1>$<?php echo $row['price'].' '.$row['currency']; ?></h1>
                    <a href="<?php echo  base_url('products/buy/'.$row['id']); ?>" class="btn"><img src="<?php echo base_url('assets/images/paypal-btn.png'); ?>" /></a>
                </div> 
            </div>
        <?php } 
    }else{ ?>
        <p>Product(s) not found...</p>
    <?php } ?>

</body>
</html>