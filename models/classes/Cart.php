<?php
include_once "models/classes/CartItem.php";
class Cart
{

    private $cartItem=array();
    private $totalPrice;
    private $id;
    private $user;

    public function __construct()
    {
        $this->cartItem = array();
        $this->totalPrice = 0;
    }

    public function addItem($item)
    {
        array_push($this->cartItem, $item);
    }

    /**
     * Get the value of cartItem
     */
    public function getCartItem()
    {
        return $this->cartItem;
    }

    /**
     * Set the value of cartItem
     *
     * @return  self
     */
    public function setCartItem($cartItem)
    {
        $this->cartItem = $cartItem;

        return $this;
    }

    /**
     * Get the value of totalPrice
     */
    public function getTotalPrice()
    {
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
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
}
