<?php
require_once 'ProductDoc.php';

class ProductDetailDoc extends ProductDoc
{
    private $product=null;
    public function __construct($model)
    {
       
        parent::__construct($model);
        $this->product=$this->model->getProducts()[0];

    }

    protected function mainContent()
    {
        $form = $this->generateForm($this->product->getId());
        return $this->sowProductCntainer($this->product, $form);
    }

    protected function sowProductCntainer($p, $form)
    {

        $id = $p->getId();
        $name = $p->getName();        
        $description = $p->getDescription();
        $src = $p->getFileName();;
        $price = $p->getPrice();
        return div(class: 'detailPageProduct', content: $this->showProduct($id, $name, $description, $src, $price) . $form);
    }

    private function generateForm($id)
    {
        $hiddenInput = input(type: 'hidden', value: $id, name: 'id') .
         input(type: 'hidden', value: 'detail', name: 'page');
        $submit = input(type: 'submit', value: 'Add', class: 'cartButton', name: 'submit');
        $form = form(id: '', action: 'index.php?page=detail&id=' . $id, method: 'POST', content: $hiddenInput . $submit);
        return $form;
    }
}
