<?php
function cart($data)
{
    $result = '';

    $totalPrice = 0;
    foreach ($data as $el) {

        $p = getProductById($el['id']);
        $price = number_format(floatval($p['price']) *  floatval($el['nbrOfItems']), 2, '.', '');
        $totalPrice += floatval($price);
        $pdiv = a(class: ' cartElement', href: 'index.php?page=detail&id=' . $el['id'], content: showProduct(id: $el['id'], name: $p['name'], src: $p['filename'], price: $p['price'], description: ''));
        //$pdiv = showProduct(id: $el['id'], name: $p['name'], src: $p['filename'], price: $p['price'], description: '');

        $split = div(class: 'cartSplit', content: 'X');
        $nbrOfItems = input(type: 'number', name: $el['id'], value: $el['nbrOfItems'], class: 'cartNbrOfItems', min: '0', max: 99);
        $totaal = div(class: 'totalItem', content: '=' . $price  . ' &euro;');
        $cartEl = div(class: 'cartElement', content: $pdiv . $split . $nbrOfItems . $totaal);
        $result .=  $cartEl;
    }
    $tp = div(class: 'totalPrice', content: 'Totale Prijs = ' . $totalPrice);
    $btns = div(
        class: 'cartBtns',
        content: input(type: 'hidden', name: 'totalPrice', value: number_format($totalPrice, 2, '.', '')) .
            input(type: 'submit', name: 'submit', value: 'Setting', class: 'submit clearfix') .
            input(type: 'hidden', id: 'page', value: 'cart', name: 'page') .
            input(type: 'submit', name: 'submit', value: 'Order', class: 'submit clearfix')
    );
    return form(id: 'cart', action: 'index.php', method: 'POST', class: 'cart', content: $result . $tp . $btns);
}
