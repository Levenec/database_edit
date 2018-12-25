<?php

require_once 'db.php';
require_once 'lib.php';
// Если не задан параметр, номер товара
if(!isset($_GET['id'])){
    header('HTTP/1.1 400 BAD REQUEST');
    exit;
}

//
$id = (int)$_GET['id'];

// Получаем форму после сохранения товара
if($_POST){
    $value = saveProduct($_POST, $id);
}

// Получаем товар
$product = getProductById($_GET['id']);

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
    <div class="col-md-12">

    <form method="post">

        <input type="submit" value="Save product" /><br><br>

        <select name="cat_id">
            <?php foreach(getCategories() as $category){ ?>
                <option value="<?=$category['id']?>"
                    <?php if($category['id'] == $product['cat_id']){ echo 'selected'; } ?>>
                    <?=$category['title']?>
                </option>
            <?php } ?>
        </select>

        <?php foreach($product as $field => $value){
                if($field == 'id' || $field == 'cat_id'){
                    continue;
                }
            ?>
            <div class="col-md-6">
                <?=ucfirst($field)?><br>
                <textarea style="width: 100%" class="form-control" name="<?=$field?>"><?=htmlspecialchars($value)?></textarea>
                <br>
            </div>
        <?php } ?>
        <input type="submit" value="Save product" />
        <br>
        <br>
    </form>

    </div>
    </div>
</div>

</body>
</html>
