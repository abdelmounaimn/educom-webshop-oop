<?php

session_start();
require_once("controllers/PageControllerClass.php");
require_once "database/Crud.php";
require_once "models/PageModelClass.php";
$crud = new Crud();
$model = new PageModelClass(null, $crud);
$ctrl = new PageControllerClass($model);
$ctrl-> handleRequest();



