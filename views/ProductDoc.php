<?php
require_once 'BasicDoc.php';

abstract class ProductDoc extends BasicDoc
{
    public function __construct($model)
    {
        parent::__construct($model);
    }
    abstract protected function sowProductCntainer($product, $form );
    
    protected function showProduct($id, $name, $description, $src, $price)
    {
        $productimage = img(src: $src, alt: $name, class: 'img');
        $productName = div(class: 'name', content: $name);
        $productPrice = div(class: 'price', content: $price . ' &euro;');
        $productDescription = div(class: 'description', content: $description);
        return  $productimage . $productName . $productPrice . $productDescription;
    }
}
