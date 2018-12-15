<?php
// https://pastebin.com/4HGrSdJW
// Host: 140.82.38.238
// Login: pa_test
// Password: pa_test
// Password: parser
// TODO: move params to config
$link = mysqli_connect("140.82.38.238", "pa_test", "pa_test", "parser");
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
if(isset($_POST['h1']) && isset($_POST['url']) && isset($_POST['content'])){
    $url = mysqli_real_escape_string($link, $_POST['url']);
    $h1 = mysqli_real_escape_string($link, $_POST['h1']);
    $content = mysqli_real_escape_string($link, $_POST['content']);

    $sql = "
        UPDATE `parser`.`articles` 
           SET `url`='{$url}', 
               `h1`='{$h1}', 
               `content`='{$content}'
        WHERE `id`='{$id}'
        limit 1
    ";

    mysqli_query($link, $sql);

    header("Location: edit.php?id={$id}");
    exit;
}





// Get article by ID
$sql = "select * from articles where id = {$id}";
$result = mysqli_query($link, $sql);
$article = mysqli_fetch_assoc($result);

if(!$article){
    header("HTTP/1.0 404 Not Found");
    echo "Сорри, странички нету :)";
    exit;
}

?>

<form method="POST" action="">
    <input type="text" name="h1" placeholder="H1" value="<?=htmlspecialchars($article['h1'])?>" />
    <br>
    <input type="text" name="url" placeholder="url" value="<?=htmlspecialchars($article['url'])?>" />
    <br>
    <textarea name="content" placeholder="content"><?=htmlspecialchars($article['content'])?></textarea>
    <br>
    <input type="submit" value="Save"/>
</form>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

