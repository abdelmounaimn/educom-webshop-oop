<?php
include_once "models/classes/Cart.php";
include_once "models/classes/CartItem.php";
include_once "models/classes/Payment.php";
include_once "models/classes/User.php";
include_once "database/ShopCrud.php";
class SessionManager
{
    private $user;
    private $cart;
    public function __construct()
    {
        $this->cart = new Cart();
        $this->user=new User();
    }
    public function userLogin($user)
    {
        

        $this->user=$user;
        $this->cart= new Cart();
        if (!isset($_SESSION)) session_start();
        $_SESSION['sid'] = session_id();
        $_SESSION['email'] = $user->getEmail();
        /*
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['naam'] = $user->getName();
        $_SESSION['id'] =  $user->getId();
        $_SESSION['cart'] = new Cart();
        */
        
    }

    public function doUserLogOut()
    {
        $this->user= new User();
        $this->cart= new Cart();
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
        return $this->user->getName();
    }

    public function getLoggedUser()
    {
       return $this->user;
    }

    public function updateSissionCart($product, $nbrElement, $mode)
    {
        $cart = $this->cart;
        $totalPrice = 0;
        $cartItems = $cart->getCartItem();
        $newCartItems = array();
        $newCart = new Cart();
        $itemNotFound = true;
        foreach ($cartItems as $cartItem) {
            if ($cartItem->getProduct()->getId() == $product->getId()) {
                $itemNotFound = false;
                if ($mode == 'inc') {
                    $oldNbr = $cartItem->getNbrElement();
                    $cartItem->setNbrElement($oldNbr + 1);
                }
                if ($nbrElement > 0 && $mode == 'set') {
                    $cartItem->setNbrElement($nbrElement);
                }

                array_push($newCartItems, $cartItem);
            }
        }
        if ($itemNotFound) {
            $cartItem = new CartItem();
            $cartItem->setProduct($product);
            $cartItem->setNbrElement(1);
            $cartItem->setTotalPrice($product->getPrice());
            array_push($newCartItems, $cartItem);
        }
        foreach ($newCartItems as $cartItem){
            $totalPrice+=($cartItem->getNbrElement() * $cartItem->getProduct()->getPrice());
        }
        

        $newCart->setTotalPrice($totalPrice);
        $newCart->setCartItem($newCartItems);
        $this->cart= $newCart;
        echo "<BR> session <BR>";
        print_r($this);
    }

      public function getCart()
    {
        return $this->cart;

    }

    public function resetCart()
    {
        $this->cart= new Cart();
    }

}
