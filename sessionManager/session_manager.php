<?php

function user_login($user)
{
    if (!isset($_SESSION)) session_start();
    $_SESSION['sid'] = session_id();
    $_SESSION['email'] = $user['email'];
    $_SESSION['naam'] = $user['naam'];
    $_SESSION['cart'] = array();
}

function do_user_logout()
{
    if (!isset($_SESSION)) session_start();
    session_unset();
    session_destroy();
}

function is_user_logged_in()
{
    return isset($_SESSION['email']);
}
function get_logged_user_name()
{
    return $_SESSION['naam'];
}
function get_logged_user()
{
    return findUserByEmail($_SESSION['email']);
}

function setUpCartElement($id, $nbrOfItems = null)
{
    $cart = $_SESSION['cart'];
    $_SESSION['cart'] = addItemToCartArray(id: $id, nbrOfItems: $nbrOfItems, cart: $cart);
}

function getCartElements()
{
    return $_SESSION['cart'];
}
function resetCart(){
    $_SESSION['cart']=array();
}

function addItemToCartArray($id, $nbrOfItems, $cart)
{

    $idExist = false;
    $empty=array();
    $result = array_map(
        function ($el) use ($id, $nbrOfItems, &$idExist , &$empty) {
            if ($id == $el['id']) {
                $idExist = true;
                $nbr = ($nbrOfItems == null ? $el['nbrOfItems'] + 1 : $nbrOfItems);
                //echo $key  . '<BR>';
                return array('id' => $id, 'nbrOfItems' => $nbr);
            } else return $el;
        },
        $cart
    );
    if (!$idExist) array_push($result, array('id' => $id, 'nbrOfItems' =>  1 ));
    $result = array_filter($result,function($e){
        return $e['nbrOfItems']== 0? false : true;
    });
    return $result;
}
