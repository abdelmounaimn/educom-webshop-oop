<?php
include_once "models/classes/Product.php";
class CartItem
{
    public function __construct(){}

    private $product;
    private $nbrElement;
    private $totalPrice=0;
    
    public function setProductById($id)
    {
        $p = new Product();
        $this->product=$p->getProductById($id);
        return $this;
    }


    /**
     * Get the value of product
     */ 
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set the value of product
     *
     * @return  self
     */ 
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get the value of nbrElement
     */ 
    public function getNbrElement()
    {
        return $this->nbrElement;
    }

    /**
     * Set the value of nbrElement
     *
     * @return  self
     */ 
    public function setNbrElement($nbrElement)
    {
        $this->nbrElement = $nbrElement;

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
}
