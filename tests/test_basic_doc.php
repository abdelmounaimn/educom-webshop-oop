<?php

include_once "./../views/BasicDoc.php";


  $data = array ( 'page' => 'home',
   'bodyHeader'=> 'webshop de top 5',
    'menu' => array('home'=> 'index.php/page=home','contact'=> 'index.php/page=contact'),
);

  $view = new BasicDoc($data);
  $view  -> show();
  