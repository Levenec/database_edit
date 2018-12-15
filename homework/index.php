<?php
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

echo "Соединение с MySQL установлено!" . PHP_EOL;
echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;

$sql = "SELECT id,title,description,price  FROM shop_home.product limit 5";
$result = mysqli_query($link, $sql);
// This is my articles var
$products = array();
while($row = mysqli_fetch_assoc($result)){
    $products[] = $row;
}

foreach($products as $product){ ?>
    <br><?=$product['id']?>
    <?=$product['title']?>
    <br> <?=$product['description']?>
    <br>

    <br> <?=$product['price']?>
    <br>
    <br> <?=$product['image']?>
    <br>

<?php }