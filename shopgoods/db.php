<?php
// Host: 140.82.38.238
// Login: pa_test
// Password: pa_test
// DB: smalink
// TODO: move params to config
$link = mysqli_connect("140.82.38.238", "pa_test", "pa_test", "smalink");

if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}