<?php
include_once "database/UserCrud.php";
include_once "database/ShopCrud.php";
include_once "models/classes/User.php";
require_once "database/Crud.php";
include_once "models/classes/User.php";
include_once "models/classes/Cart.php";
include_once "models/classes/CartItem.php";
include_once "models/classes/Payment.php";
include_once "models/classes/Product.php";
//$userCrud = new UserCrud;
//$user = New User();
//test Find User

// $users = $userCrud->findUsers();
// foreach ($users as $user) {
//     $user->print();
// }


// Test Find User By Id

// $user = new User();
// $user = $userCrud->findUserById(5);
// $user->print();


//test insert User

// $user = New User();
// $user->setName("abdelmounaim");
// $user->setEmail("abdelmounaimne@gmail.nl");
// $user->setPassword("Dat_Is_Geen_Wachtwoord");
// echo $userCrud->createUser($user);


// update User
// $user = new User();
// $user = $userCrud->findUserById(5);
// $user->print();
// $userCrud= new UserCrud();
// $newUser = new User();
// echo $userCrud->updateUser(name: 'monaim', email: 'abdelmounaimne@outlook.nl', password: 'mijnpassword', id: 5);
// $userCrud= new UserCrud();
// $user = $userCrud->findUserById(5);
// $user->print();


// test delete User 

// $users = $userCrud->findUsers();
// foreach ($users as $user) {
//     $user->print();
// }
// $userCrud= new UserCrud();
// $userCrud->deleteUser(18);
// $userCrud= new UserCrud();
// $users = $userCrud->findUsers();
// foreach ($users as $user) {
//     $user->print();
// }


// test SHopCrud

// include_once "database/ShopCrud.php";
// $shopCrud= new ShopCrud();
// include_once "models/classes/Product.php";
// $prodduct = new Product();
// $products=$shopCrud->readAllProducts();
// foreach($products as $product){
//     $product->print();
// }
//test CartItem
//  $shopCrud= new ShopCrud();
//  $product4=$shopCrud->readProductById(4);
// $shopCrud= new ShopCrud();
// echo $shopCrud->createCartItem(cart:45 , nbrOfElement:4, product:4);


//   test create Cart

// $shopCrud= new ShopCrud();
// $product4=$shopCrud->readProductById(4);
// $shopCrud= new ShopCrud();
// $product5=$shopCrud->readProductById(5);
// $cart = new Cart();
// $cart->setUserId(5);
// $cartItem = new CartItem();
// $cartItem->setProduct($product4);
// $cartItem->setNbrElement(3);
// $cartItem1 = new CartItem();
// $cartItem1->setProduct($product5);
// $cartItem1->setNbrElement(2);
// $cartItems = array($cartItem,$cartItem1);
// $shopCrud = new ShopCrud();
//  echo $shopCrud->createCart( cartItems:$cartItems,user: 5);



//   test create order

// $shopCrud= new ShopCrud();
// $product4=$shopCrud->readProductById(4);
// $shopCrud= new ShopCrud();
// $product5=$shopCrud->readProductById(5);
// $cart = new Cart();
// $cart->setUserId(5);
// $cartItem = new CartItem();
// $cartItem->setProduct($product4);
// $cartItem->setNbrElement(3);
// $cartItem1 = new CartItem();
// $cartItem1->setProduct($product5);
// $cartItem1->setNbrElement(2);
// $cart->setCartItem(array($cartItem,$cartItem1));
// $shopCrud = new ShopCrud();
//  echo $shopCrud->createOrder( cart:$cart,checkout:0,totalPrice:675);



