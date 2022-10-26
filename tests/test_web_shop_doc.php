<?php

include_once "./../views/WebshopDoc.php";


$data = array(
    'page' => 'home',
    'bodyHeader' => 'welkom in de home page van de webshop de top 5',
    'menu' => array('home' => 'index.php/page=home', 'contact' => 'index.php/page=contact'),
    'products' =>
    array(
        array(
            'product_id' => rand(1, 4),
            'description' => generateRandomString(300),
            'name' => generateRandomString(30),
            'filename' => './../images/' . rand(1,4) . '.jfif',
            'price' => rand(1, 999)
        ),

        array(
            'product_id' => rand(1, 4),
            'description' => generateRandomString(300),
            'name' => generateRandomString(30),
            'filename' => './../images/' . rand(1,4) . '.jfif',
            'price' => rand(1, 999)
        ),
        array(
            'product_id' => rand(1, 4),
            'description' => generateRandomString(300),
            'name' => generateRandomString(30),
            'filename' => './../images/' . rand(1,4) . '.jfif',
            'price' => rand(1, 999)
        ),
        array(
            'product_id' => rand(1, 4),
            'description' => generateRandomString(300),
            'name' => generateRandomString(30),
            'filename' => './../images/' . rand(1,4) . '.jfif',
            'price' => rand(1, 999)
        ),
        array(
            'product_id' => rand(1, 4),
            'description' => generateRandomString(300),
            'name' => generateRandomString(30),
            'filename' => './../images/' . rand(1,4) . '.jfif',
            'price' => rand(1, 999)
        ),
        array(
            'product_id' => rand(1, 4),
            'description' => generateRandomString(300),
            'name' => generateRandomString(30),
            'filename' => './../images/' . rand(1,4) . '.jfif',
            'price' => rand(1, 999)
        ),
        array(
            'product_id' => rand(1, 4),
            'description' => generateRandomString(300),
            'name' => generateRandomString(30),
            'filename' => './../images/' . rand(1,4) . '.jfif',
            'price' => rand(1, 999)
        ),
        array(
            'product_id' => rand(1, 4),
            'description' => generateRandomString(300),
            'name' => generateRandomString(30),
            'filename' => './../images/' . rand(1,4) . '.jfif',
            'price' => rand(1, 999)
        )
    )
);

$view = new WebshopDoc($data);
$view->show();

function generateRandomString($length)
{
    $characters = '0123   4567 89abcd efghij klmnop qrs tuvw x  yzABC DEFG HI JKLM NOP QRSTU V WXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
