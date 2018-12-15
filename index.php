<?php
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

echo "Соединение с MySQL установлено!" . PHP_EOL;
echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;

$sql = "SELECT id, url FROM parser.articles limit 5";
$result = mysqli_query($link, $sql);
// This is my articles var
$articles = array();
while($row = mysqli_fetch_assoc($result)){
    $articles[] = $row;
}

foreach($articles as $article){ ?>
    <b><?=$article['id']?></b>
    <?=$article['url']?>
    <br>
<?php }