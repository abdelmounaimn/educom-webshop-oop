<?php

function getProducts()
{
    try {
        $Allproducts = findProducts();
        return sizeof($Allproducts) > 0 ? $Allproducts : 'jouw webshop is nog leeg';
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
function getProductById($id)
{
    try {
        $product = findProductById($id);
        return $product != null ? $product : 'product not found';
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
function addPaymentService($userId, $cartItems, $totalPrice)
{
    try {
        return addPaymentToDatabase($userId, $cartItems, $totalPrice);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
