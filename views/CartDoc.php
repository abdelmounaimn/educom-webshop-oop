<?php
require_once 'ProductDoc.php';
include_once "models/classes/Cart.php";
include_once "models/classes/Product.php";
include_once "models/classes/CartItem.php";
class CartDoc extends ProductDoc
{
    public function __construct($model)
    {
        parent::__construct($model);
    }

    protected function mainContent()
    {
        $form = '';
        $session= $this->model->GetSessionManager();
        $cartItems =  $session->getCart()->getCartItem();
        return $this->showCart($cartItems, $form);
    }
    private function showCart($cartItems)
    {

        $totalPrice = 0;
        $items = '';

        foreach ($cartItems as $i) {
            $items .= $this->sowProductCntainer($i, $i->getTotalPrice(), ' ');
        }
        $session= $this->model->GetSessionManager();
        $totalPrice=$session->getCart()->getTotalPrice();

        $tp = div(class: 'totalPrice', content: 'Totale Prijs = ' . $totalPrice);
        $btns = div(
            class: 'cartBtns',
            content: input(type: 'hidden', name: 'totalPrice', value: number_format($totalPrice, 2, '.', '')) .
                input(type: 'submit', name: 'submit', value: 'Setting', class: 'submit clearfix') .
                input(type: 'hidden', id: 'page', value: 'cart', name: 'page') .
                input(type: 'submit', name: 'submit', value: 'Order', class: 'submit clearfix')
        );
        return form(id: 'cart', action: 'index.php', method: 'POST', class: 'cart', content: $items . $tp . $btns);
    }

    protected function sowProductCntainer($item, $form)
    {
        $ElementPrice = number_format($item->getTotalPrice(), 2, '.', '');
        $product = $item->getProduct();
        $pdiv = a(class: ' cartElement', href: 'index.php?page=detail&id=' . $product->getId(), content: $this->showProduct(id: $product->getId(), name: $product->getName(), src: $product->getFileName(), price: $product->getPrice(), description: ''));
        $split = div(class: 'cartSplit', content: 'X');
        $nbrOfItems = input(type: 'number', name: $product->getId(), value: $item->getNbrElement(), class: 'cartNbrOfItems', min: '0', max: 99);
        $totaal = div(class: 'totalItem', content: '=' . $ElementPrice . ' &euro;');
        $cartEl = div(class: 'cartElement', content: $pdiv . $split . $nbrOfItems . $totaal);
        return $cartEl;
    }
}
