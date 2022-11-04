<?php
require_once "database/Crud.php";
include_once "models/classes/User.php";
include_once "models/classes/Cart.php";
include_once "models/classes/CartItem.php";
include_once "models/classes/Payment.php";
include_once "models/classes/Product.php";
class ShopCrud
{
    private $crud;
    public function __construct($crud)
    {
        $this->crud = $crud;
    }
    public function readAllProducts()
    {
        $sql = "Select * from products";
        return $this->crud->readMoreRow(sql: $sql, params: array(), class: "Product");
    }
    public function readProductById($id)
    {
        $sql = "Select * from products where id= :id";
        $params['id'] = $id;
        $SelectedUsers = $this->crud->readMoreRow(sql: $sql, params: $params, class: "Product");
        return sizeof($SelectedUsers) == 1 ? $SelectedUsers[0] : false;
    }

    /**
     * createCart
     *
     * @param  number $user is djust user Id 
     * @return the id of the added Cart
     */
    /**
     * createCart
     *
     * @param  array $cartItems array of items Object
     * @param  number $user is djust user Id 
     * @return the id of the added Cart
     */
    public function createCart($cartItems, $user)
    {
        $sql = "INSERT INTO carts(user) VALUES( :user)";
        $params['user'] = $user;
        $cartId = $this->crud->createOne(sql: $sql, params: $params);

        //Add Cart Itens For de Cart
        if ($cartId >= 1) foreach ($cartItems as $cartItem) {
            $this->createCartItem(cart: $cartId, nbrOfElement: $cartItem->getNbrElement(), product: $cartItem->getProduct()->getId());
        }
        return $cartId >= 1 ? $cartId : false;
    }

    /**
     * createCartItem
     *
     * @param  Object   $cart           instance of Cart Class you need here only id of Crat
     * @param  Number   $nbrOfElement   
     * @param  number   $product        the product Id
     * @return mixed    CartItemId      returned id of cartItem or false if does not happend
     */

    public function createCartItem($cart, $nbrOfElement, $product)
    {

        $sql = "INSERT INTO cart_items(cart,nbrElement,product) VALUES( :cart , :nbrElement, :product)";
        $params['cart'] = $cart;
        $params['nbrElement'] = $nbrOfElement;
        $params['product'] = $product;
        $cartItenId = $this->crud->createOne(sql: $sql, params: $params);

        return $cartItenId >= 1 ? $cartItenId : false;
    }

    /**
     * createOrder
     *
     * @param  Object   $cart           instance of Cart Class you need here only id of Crat
     * @param  {0,1} $checkout
     * @param  number $totalPrice
     * @return returned id of added Order or false if does not happend
     */

    public function createOrder($cart, $checkout, $totalPrice)
    {
        $cartItems = $cart->getCartItem();
        $userId = $cart->getUser();
        //create Cart for the User
        $cartId = $this->createCart(cartItems: $cartItems, user: $userId);
        // add Order to the DB
        $sql = "INSERT INTO payments(cart,checkout,totalPrice) VALUES( :cart , :checkout, :totalPrice)";
        $params['cart'] = $cartId;
        $params['checkout'] = $checkout;
        $params['totalPrice'] = $totalPrice;
        $user_id = $this->crud->createOne(sql: $sql, params: $params);
        return $user_id >= 1 ? $user_id : false;
    }
}
