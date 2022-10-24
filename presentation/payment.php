<?php
function payment($data){
    $header = h1('Totale Prijs is :' ) . p($data['totalPrice']) . hr();
    $hiddenELement = input(type: 'hidden', id: 'page', value: 'payment', name: 'page').
    input(type: 'hidden', id: 'page', value: $data['totalPrice'], name: 'totalPrice');
    $submitButton = input(type: 'submit',  value: "OKE",  class: 'submit clearfix');
    $form = form(id : '', action : 'index.php', method : 'POST', content: $hiddenELement . $submitButton);
    $formpage = div($class = $data['page'], $content =$header . $form);
    return $formpage;
return 'payment id = ' . (isset($data['payment']) ? $data['payment'] : 'not found')  ; 


}