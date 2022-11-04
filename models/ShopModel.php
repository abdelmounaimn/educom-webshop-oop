<?php
include_once "database/ShopCrud.php";
include_once "models/classes/Product.php";
include_once "models/PageModelClass.php";
include_once "utils/Utils.php";
class ShopModel extends PageModelClass
{
    private $products = array();
    private $cart;
    private $payment;
    public function __construct($model)
    {
        parent::__construct($model, $model->getCrud());
    }
    public function getProductById($id)
    {
        try {
            $shopCrud = new ShopCrud($this->getCrud());
            return $shopCrud->readProductById($id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function getProducts()
    {
        try {
            $shopCrud = new ShopCrud($this->getCrud());
            $this->products = $shopCrud->readAllProducts();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $this->products;
    }

    public function validateDetailPage()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $session = $this->getSessionManager();
            $shopCrud = new ShopCrud($this->getCrud());
            $product =  $shopCrud->readProductById($_POST['id']);
            $session->updateSissionCart(product: $product, nbrElement: 1, mode: 'inc');
            return $_POST['id'];
        } 
        else return Util::getUrlVar("id", 0);
    }

    public function validateCart()
    {
        $session = $this->sessionManager;
        $data = array('page' => 'cart', 'cart' => null, 'productId' => -1);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            switch ($_POST['submit']) {
                case 'Setting':
                    foreach ($_POST as $key => $val) {
                        if (is_int($key)) {
                            $shopCrud = new ShopCrud($this->model->getCrud());
                            $product = $shopCrud->readProductById($key);
                            $session->updateSissionCart(product: $product, nbrElement: $val, mode: 'set');
                        }
                    }
                    return 'cart';
                    break;
                case 'Order':
                    foreach ($_POST as $key => $val) {
                        if (is_int($key)) {
                            $shopCrud = new ShopCrud($this->model->getCrud());
                            $product = $shopCrud->readProductById($key);
                            $session->updateSissionCart(product: $product, nbrElement: $val, mode: 'set');
                        }
                    }
                    $user = $session->getLoggedUser();
                    $cart = $session->getCart();
                    include_once "models/classes/Payment.php";
                    $payment = new Payment();
                    $payment->setCart($cart);
                    $payment->setUserId($user['id']);
                    $shopCrud = new ShopCrud($this->model->getCrud());
                    $shopCrud->createOrder($cart, 0, $cart->getTotalPrice());
                    $session->resetCart();
                    return 'payment';
                    break;
            }
        }
        else{
            return 'cart';
        }
    }
}
