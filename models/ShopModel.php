<?php
include_once "database/database_repository.php";
include_once "models/classes/Product.php";
include_once "models/PageModelClass.php";
class ShopModel extends PageModelClass
{
    private $products = array();
    public function __construct($model)
    {
        parent::__construct($model);
    }
    public function getProductsFromDb()
    {
        try {
            $ps = findProducts();
            foreach ($ps as $p) {
                $product = new Product();

                $product->setProduct(
                    name: $p['name'],
                    id: $p['product_id'],
                    description: $p['description'],
                    fileName: $p['filename'],
                    price: $p['price']
                );
                array_push(
                    $this->products,
                    $product
                );
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function getProductById($id)
    {
        $prod = new Product();
        $prod->getProductById($id);
        array_push(
            $this->products,
            $prod
        );
    }

    /**
     * Get the value of products
     */
    public function getProducts()
    {
        return $this->products;
    }
}
