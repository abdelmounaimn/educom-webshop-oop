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
        return self::getArrayVar($_POST, $key, $default);
    }

    public static function getArrayVar($array, $key, $default = '')
    {
        return isset($array[$key]) ? $array[$key] : $default;
    }

    public static function getUrlVar($key, $default = 'other')
    {
        if (count(array_keys($_GET)) == 0) return 'home';
        return filter_input(INPUT_GET, $key);
    }

    public static function addElementToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $session = new SessionManager();
            $session->setUpCartElement(id: $_POST['id']);
            return $_POST['id'];
        } else return Util::getUrlVar("id", 0);
    }
    public static function validateCart()
    {
        include_once "sessionManager/SessionManager.php";
        $session = new SessionManager();
        $data = array('page' => 'cart', 'cart' => null, 'productId' => -1);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            switch ($_POST['submit']) {
                case 'Setting':

                    foreach ($_POST as $key => $val) {

                        if (is_int($key)) {
                            $session->setUpCartElement(id: $key, nbrOfItems: $val);
                        }
                    }
                    return 'cart';
                    break;
                case 'Order':
                    foreach ($_POST as $key => $val) {

                        if (is_int($key)) {
                            $session->setUpCartElement(id: $key, nbrOfItems: $val);
                        }
                    }
                    $user = $session->getLoggedUser();
                    require_once "services/webshopServices.php";
                    $cart = self::getCartFromSession();
                    include_once "models/classes/Payment.php";
                    $payment = new Payment();
                    $payment->setCart($cart);
                    $payment->setUserId($user['id']);
                    $payment->savePayemnt();
                    $session->resetCart();
                    return 'payment';
                    break;
            }
        }
    }
    public static function getCartFromSession()
    {
        include_once "sessionManager/SessionManager.php";
        $cart = new Cart();
        $session = new SessionManager();
        $itemsSession = $session->getCartElements();
        foreach ($itemsSession as $item) {
            $cartItem = new CartItem();
            $cartItem->setProductById($item['id']);
            $cartItem->setNbrElement($item['nbrOfItems']);
            $cartItem->setTotalPrice(($cartItem->getProduct()->getPrice() * $cartItem->getNbrElement()));
            $cart->addItem($cartItem);
        }
        return $cart;
    }
}
