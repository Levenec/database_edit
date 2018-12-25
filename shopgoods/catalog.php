<?php

require_once 'db.php';
require_once 'lib.php';
$products = getProducts();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <?php foreach($products as $product){ ?>
            <div class="col-md-4" style="border: 1px solid #dedede">
                <img style="width: 60px" src="<?=$product['img_url']?>" />
                <b><?=$product['code']?></b>
                <p>Price: $<?=number_format($product['price'],2)?></p>
                <a href="buy.php?id=<?=$product['id']?>">Buy</a>
                <a href="edit.php?id=<?=$product['id']?>" style="color:red;">Edit</a>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>