<?php
class SessionManager
{
    public function userLogin($user)
    {
        if (!isset($_SESSION)) session_start();
        $_SESSION['sid'] = session_id();
        $_SESSION['email'] = $user['email'];
        $_SESSION['naam'] = $user['naam'];
        $_SESSION['cart'] = array();
    }

    public function do_user_logout()
    {
        if (!isset($_SESSION)) session_start();
        session_unset();
        session_destroy();
    }

    public function isUserLoggedIn()
    {

        return isset($_SESSION['email']);
    }
    public function getLoggedUserName()
    {
        return $_SESSION['naam'];
    }
    public function getLoggedUser()
    {
        return array('name' => $_SESSION['naam'], 'email' =>$_SESSION['email'] );
    }

    public function setUpCartElement($id, $nbrOfItems = null)
    {
        $cart = $_SESSION['cart'];
        $_SESSION['cart'] = $this->updateItemToCartArray(id: $id, cart: $cart, nbrOfItems: $nbrOfItems);
    }

    public function getCartElements()
    {
        return $_SESSION['cart'];
    }
    public function resetCart()
    {
        $_SESSION['cart'] = array();
    }

    public function updateItemToCartArray($id, $cart, $nbrOfItems = null)
    {

        $idExist = false;
        $result = array_map(
            function ($el) use ($id, $nbrOfItems, &$idExist) {
                if ($id == $el['id']) {
                    $idExist = true;
                    $nbr = ($nbrOfItems == null ? $el['nbrOfItems'] + 1 : $nbrOfItems);

                    return array('id' => $id, 'nbrOfItems' => $nbr);
                } else return $el;
            },
            $cart
        );
        if (!$idExist) array_push($result, array('id' => $id, 'nbrOfItems' =>  1));
        $result = array_filter($result, function ($e) {
            return $e['nbrOfItems'] == 0 ? false : true;
        });
        return $result;
    }
}