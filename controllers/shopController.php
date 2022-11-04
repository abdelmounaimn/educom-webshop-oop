<?php
require_once("models/PageModelClass.php");
require_once "utils/Utils.php";

class PageControllerClass
{
    protected $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    
}