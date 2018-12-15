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

<h1><?=$article['h1']?></h1>
<div>
    <?=$article['content']?>
</div>


