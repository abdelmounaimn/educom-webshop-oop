<?php
include_once "models/classes/Cart.php";
include_once "models/classes/CartItem.php";
include_once "models/classes/Payment.php";
include_once "models/classes/User.php";
include_once "database/ShopCrud.php";
class SessionManager
{

    public function __construct()
    {
    }

    public function userLogin($user)
    {
        if (!isset($_SESSION)) session_start();
        $_SESSION['sid'] = session_id();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['name'] = $user->getname();
        $_SESSION['user'] = serialize($user);
        $_SESSION['cart'] = serialize(new Cart());
    }
    public function getUser()
    {
        return unserialize($_SESSION['user']);
    }

    public function doUserLogOut()
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
        return $_SESSION['name'];
    }

    public function getLoggedUser()
    {
        return $_SESSION['user'];
    }

    public function updateSissionCart($product, $nbrElement, $mode)
    {
        $cart = unserialize($_SESSION['cart']);
        $totalPrice = 0;
        $cartItems = $cart->getCartItem();
        $newCartItems = array();
        $newCart = new Cart();
        $notfound = true;
        foreach ($cartItems as $cartItem) {
            if ($cartItem->getProduct()->getId() == $product->getId()) {
                $notfound = false;
                if ($mode == 'inc') {
                    $oldNbr = $cartItem->getNbrElement();
                    $cartItem->setNbrElement($oldNbr + 1);
                    array_push($newCartItems, $cartItem);
                } else {
                    if ($nbrElement != 0) {
                        $cartItem->setNbrElement($nbrElement);
                        array_push($newCartItems, $cartItem);
                    }
                }
            }else
            array_push($newCartItems, $cartItem);
        }
        if ($notfound) {
            $cartItem = new CartItem();
            $cartItem->setProduct($product);
            $cartItem->setNbrElement(1);
            $cartItem->setTotalPrice($product->getPrice());
            array_push($newCartItems, $cartItem);
        }

        foreach ($newCartItems as $cartItem) {
            $totalPrice += ($cartItem->getNbrElement() * $cartItem->getProduct()->getPrice());
        }


        $newCart->setTotalPrice($totalPrice);
        $newCart->setCartItem($newCartItems);
        $_SESSION['cart'] = serialize($newCart);
    }

    public function getCart()
    {
        return unserialize($_SESSION['cart']);
    }

    public function resetCart()
    {
        $_SESSION['cart'] = serialize(new Cart());
    }
}
