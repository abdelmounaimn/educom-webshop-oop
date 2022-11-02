<?php

include_once "database/database_repository.php";
include_once "models/classes/Cart.php";
class Payment
{

    private $cart;
    private $totalPrice =0;
    private $userId;

    public function __construct()
    {
        $this->cart = new Cart();
        $this->totalPrice = 0;
    }

    public function updateTotalPrice()
    {
        $this->totalPrice=0;
        foreach ($this->cart->getCartItem() as $cartItem) {
            $this->totalPrice += ($cartItem->getTotalPrice() + $cartItem->getNbrElement());
        }
    }
    public function savePayemnt()
    {
        try {
            savePyemnt($this);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    /**
     * Get the value of cart
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Set the value of cart
     *
     * @return  self
     */
    public function setCart($cart)
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * Get the value of totalPrice
     */
    public function getTotalPrice()
    {
        $this->updateTotalPrice();
        return $this->totalPrice;
    }

    /**
     * Set the value of totalPrice
     *
     * @return  self
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get the value of userId
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }
}
