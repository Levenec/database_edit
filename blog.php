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
 * SELECT ARTICLES FROM DB!
 */
$sql = "SELECT id, url, h1 FROM parser.articles";
$result = mysqli_query($link, $sql);
// This is my articles var
$articles = array();
while($row = mysqli_fetch_assoc($result)){
    $articles[] = $row;
}

foreach($articles as $article){ ?>
    <b><?=$article['h1']?></b>
    <a href="article.php?id=<?=$article['id']?>">Читать далее</a>
    <a href="edit.php?id=<?=$article['id']?>">Редактировать</a>
    <br>
<?php }