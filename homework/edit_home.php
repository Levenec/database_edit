<?php
// https://pastebin.com/4HGrSdJW
// Host: 140.82.38.238
// Login: pa_test
// Password: pa_test
// Password: parser
// TODO: move params to config
$link = mysqli_connect("127.0.0.1", "root", "1121989lev11", "shop_home");

if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


mysqli_query($link,'set names utf8');

/**
 * Select one article from database (table)
 */
$id = 0;
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
}

// SQL Injection
if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['price'])){
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $description = mysqli_real_escape_string($link, $_POST['description']);
    $price = mysqli_real_escape_string($link, $_POST['price']);

    $sql = "
        UPDATE `shop_home`.`product` 
           SET `title`='{$title}', 
               `description`='{$description}', 
               `price`='{$price}'
        WHERE `id`='{$id}'
        limit 1
    ";

    mysqli_query($link, $sql);



    header("Location: index.php");
    exit;
}



// Get article by ID
$sql = "select * from product where id = {$id}";
$result = mysqli_query($link, $sql);
$product = mysqli_fetch_assoc($result);

if(!$product){
    header("HTTP/1.0 404 Not Found");
    echo "Сорри, странички нету :)";
    exit;
}

?>

<form method="POST" action="">
    <input type="text" name="title" placeholder="H1" value="<?=htmlspecialchars($product['title'])?>" />
    <br>
    <input type="text" name="price" placeholder="url" value="<?=htmlspecialchars($product['price'])?>" />
    <br>
    <textarea name="description" placeholder="content"><?=htmlspecialchars($product['description'])?></textarea>
    <br>
    <input type="submit" value="Save"/>
</form>
<!--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>-->
<!--<script>tinymce.init({ selector:'textarea' });</script>-->
