<?php

include_once "./../views/AboutDoc.php";


$data = array(
    'page' => 'about',
    'bodyHeader' => 'About',
    'menu' => array('home' => 'index.php/page=home', 'contact' => 'index.php/page=contact'),
    'user'=> array('name'=>'Abdel', 'email'=>'abdel@nejjari.com')
);

$view = new AboutDoc($data);
$view->show();
