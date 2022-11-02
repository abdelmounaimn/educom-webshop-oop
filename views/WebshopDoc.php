<?php
require_once 'ProductDoc.php';

class WebshopDoc extends ProductDoc
{
    public function __construct($model)
    {
        parent::__construct($model);
    }

    protected function mainContent()
    {
        $form = '';
        return $this->showProducten($this->model->getProducts(), $form);
    }

    private function showProducten($ps,$form)
    {
        $content = '';
        for ($i = 0; $i < sizeof($ps); $i++) {
            $p = $ps[$i];
            $content.=$this->sowProductCntainer($p, $form,0);
        }
            return div(class: 'webshop',content: $content);
        
    }
    protected function sowProductCntainer($p, $form)
    {
        $id = $p->getId();
        $name = $p->getName();        
        $description = $p->getDescription();
        $src = $p->getFileName();;
        $price = $p->getPrice();
        $class = 'productInShoppingPage';
        $url = "index.php?page=detail&id=" . $p->getId();
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
