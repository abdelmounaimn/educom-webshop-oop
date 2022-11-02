<?php
include_once "database/database_repository.php";
class Product
{
    private $name;
    private $id;
    private $description;
    private $fileName;
    private $price;

    public function __construct()
    {
    }
    public function  setProduct($name, $id, $description, $fileName, $price)
    {
        $this->name = $name;
        $this->id = $id;
        $this->description = $description;
        $this->fileName = $fileName;
        $this->price = $price;
        return $this;
    }


    public function getProductById($id)
    {
        try {
            $product = findProductById($id);
            $this->name = $product['name'];
            $this->id = $product['product_id'];
            $this->description = $product['description'];
            $this->fileName = $product['filename'];
            $this->price = $product['price'];
            return $this;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of fileName
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }
}
