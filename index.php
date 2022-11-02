<?php

session_start();
require_once("controllers/PageControllerClass.php");
$ctrl = new PageControllerClass();
$ctrl-> handleRequest();

