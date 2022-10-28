<?php

class Util
{


    public static function getRequestedPage()
    {

        $requested_type = $_SERVER['REQUEST_METHOD'];
        if ($requested_type == 'POST') {
            $requested_page = self::getPostVar('page', 'home');
        } else {
            $requested_page = self::getUrlVar('page', 'home');
        }
        return $requested_page;
    }

    public static function getPostVar($key, $default = '')
    {
        return self :: getArrayVar($_POST, $key, $default);
    }
    public static function getArrayVar($array, $key, $default = '')
    {
        return isset($array[$key]) ? $array[$key] : $default;
    }

    public static function getUrlVar($key, $default = 'other')
    {

        if (count(array_keys($_GET)) == 0) return 'home';
        return filter_input(INPUT_GET, $key);
        //$nbrArgs = count(array_keys($_GET));

        //return  $nbrArgs == 1 ? filter_input(INPUT_GET, $key) :  $default;
    }
}
