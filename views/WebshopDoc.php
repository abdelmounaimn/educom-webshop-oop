<?php
require_once 'ProductDoc.php';

class WebshopDoc extends ProductDoc
{
    public function __construct($myData)
    {
        parent::__construct($myData);
    }

    protected function mainContent()
    {
        $form = '';
        return $this->showProducten($this->data['products'], $form);
    }

    private function showProducten($ps,$form)
    {
        $content = '';
        for ($i = 0; $i < sizeof($ps); $i++) {
            $p = $ps[$i];
            $content.=$this->sowProductCntainer($p, $form);
        }
            return div(class: 'webshop',content: $content);
        
    }
    protected function sowProductCntainer($p, $form)
    {
        $id = $p['product_id'];
        $name = $p['name'];
        $description = $p['description'];
        $src = $p['filename'];
        $price = $p['price'];
        $class = 'productInShoppingPage';
        $url = "index.php?page=detail&id=" . $p['product_id'];
        return a(href: $url,class: $class, content: $this->showProduct($id, $name, $description, $src, $price) . $form);
    }

    private function generateForm($id)
    {
        /*
        $hiddenInput = input(type: 'hidden', value: $id, name: 'cart') . input(type: 'hidden', value: 'cart', name: 'page');
        $submit = input(type: 'submit', value: 'Add', class: 'cartButton', name: 'submit');
        $form = form(id: '', action: 'index.php?page=detail&id=' . $id, method: 'POST', content: $hiddenInput . $submit);
        return $form;
        */
    }
}
