<?php

function showShoppinPage()
{

    $product = '';
    $products=getProducts();
    for ($i = 0; $i < sizeof($products); $i++) {
        $p= $products[$i];
        $class = 'productInShoppingPage';
        $url="index.php?page=detail&id=" . $p['product_id'];
        $product .= a(
            class: $class,
            href:  $url,
            content: showProduct( id: $p['product_id'], name:  $p['name'], description:$p['description'], src: $p['filename'],price: $p['price'] )
        );
    }


    return div(class: 'shoppingPAge', content: $product);
}

function showProduct($id, $name, $description, $src, $price)
{

    $productimage = img(src: $src, alt: $name, class: 'img');
    $productName = div(class: 'name', content: $name);
    $productPrice = div(class: 'price', content: $price . ' &euro;');
    $productDescription = div(class: 'description', content: $description);
    return  $productimage . $productName . $productPrice . $productDescription;
}

function generateRandomString($length)
{
    $characters = '0123   4567 89abcd efghij klmnop qrs tuvw x  yzABC DEFG HI JKLM NOP QRSTU V WXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function showDetailPage($id)
{
    $p = getProductById($id);
    $hiddenInput= input(type:'hidden',value:$id, name:'cart') . input(type:'hidden',value:'cart', name:'page');
    $submit= input(type:'submit', value:'Add', class:'cartButton', name:'submit');
    $form =form(id: '',action: 'index.php?page=detail&id='. $id, method:'POST',content : $hiddenInput . $submit );
    return div(class: 'detailPageProduct', 
    content:showProduct( id: $p['product_id'], 
    name:  $p['name'],
     description:$p['description'], 
     src: $p['filename'],
     price: $p['price']) . $form);
    
}
