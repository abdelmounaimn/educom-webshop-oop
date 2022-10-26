<?php
require_once 'ProductDoc.php';

class ProductDetailDoc extends ProductDoc
{
    public function __construct($myData)
    {
        parent::__construct($myData);
    }

    protected function mainContent()
    {
        $form = $this->generateForm($this->data['product']['product_id']);
        return $this->sowProductCntainer($this->data['product'], $form);
    }

    protected function sowProductCntainer($p, $form)
    {
        $id = $p['product_id'];
        $name = $p['name'];
        $description = $p['description'];
        $src = $p['filename'];
        $price = $p['price'];
        return div(class: 'detailPageProduct', content: $this->showProduct($id, $name, $description, $src, $price) . $form);
    }

    private function generateForm($id)
    {
        $hiddenInput = input(type: 'hidden', value: $id, name: 'cart') . input(type: 'hidden', value: 'cart', name: 'page');
        $submit = input(type: 'submit', value: 'Add', class: 'cartButton', name: 'submit');
        $form = form(id: '', action: 'index.php?page=detail&id=' . $id, method: 'POST', content: $hiddenInput . $submit);
        return $form;
    }
}
