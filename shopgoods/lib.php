<?php

/**
 * @return array
 */
function getCategories(){
    global $link;
    $cats = array();
    $result = mysqli_query($link, "SELECT * FROM smalink.cats");
    while($row = mysqli_fetch_assoc($result)){
        $cats[] = $row;
    }
    return $cats;
}

/**
 * @return array
 */
function getProducts(){
    global $link;
    $products = array();
    $result = mysqli_query($link, "SELECT * FROM smalink.products limit 10");
    while($row = mysqli_fetch_assoc($result)){
        $products[] = $row;
    }
    return $products;
}

/**
 * @param $id
 * @return array|null
 */
function getProductById($id){
    global $link;
    $id = (int)$id;
    $sql = "
        SELECT * FROM smalink.products
          where id = {$id}
    ";
    $result = mysqli_query($link, $sql);
    $product = mysqli_fetch_assoc($result);

    return $product;
}

/**
 * @param $link
 * @param $id
 * @return string
 */
function saveProduct($data, $id)
{
    global $link;
    $updates = array();
    foreach ($data as $key => $value) {
        if ($key == 'id') {
            continue;
        }
        $value = mysqli_escape_string($link, $value);
        $updates[] = "{$key} = '{$value}'";
    }

    $sql = "
        UPDATE `smalink`.`products` 
        SET " . implode(',' . PHP_EOL, $updates) . " 
        WHERE `id` = {$id}
    ";

    mysqli_query($link, $sql);
    return $value;
}