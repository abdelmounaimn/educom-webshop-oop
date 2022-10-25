<?php

include_once "./../views/HomeDoc.php";


$data = array(
    'page' => 'home',
    'bodyHeader' => 'welkom in de home page van de webshop de top 5',
    'menu' => array('home' => 'index.php/page=home', 'contact' => 'index.php/page=contact'),
);

$view = new HomeDoc($data);
$view->show();
