<?php
require_once 'ProductDoc.php';

class CartDoc extends ProductDoc
{
    public function __construct($myData)
    {
        parent::__construct($myData);
    }

    protected function mainContent()
    {
        $form = '';
        return $this->showCart($this->data['cartItems'], $form);
    }
    private function showCart($cartItems)
    {
        $totalPrice = 0;
        $items = '';
        foreach ($cartItems as $i) {
            $totalPrice += (floatval($i['price']) *  floatval($i['nbrOfItems']));
            $items .= $this->sowProductCntainer($i, ' ');
        }
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

    protected function sowProductCntainer($cartElemnt, $form)
    {
        $ElementPrice = number_format(floatval($cartElemnt['price']) *  floatval($cartElemnt['nbrOfItems']), 2, '.', '');
        $pdiv = a(class: ' cartElement', href: 'index.php?page=detail&id=' . $cartElemnt['id'], content: $this->showProduct(id: $cartElemnt['id'], name: $cartElemnt['name'], src: $cartElemnt['filename'], price: $cartElemnt['price'], description: ''));

        $split = div(class: 'cartSplit', content: 'X');
        $nbrOfItems = input(type: 'number', name: $cartElemnt['id'], value: $cartElemnt['nbrOfItems'], class: 'cartNbrOfItems', min: '0', max: 99);
        $totaal = div(class: 'totalItem', content: '=' . $ElementPrice . ' &euro;');
        $cartEl = div(class: 'cartElement', content: $pdiv . $split . $nbrOfItems . $totaal);
        return $cartEl;
    }
}
