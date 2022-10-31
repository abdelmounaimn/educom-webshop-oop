<?php
require_once 'BasicDoc.php';

class ThinksDoc extends BasicDoc
{
    public function __construct($model)
    {
        parent::__construct($model);
    }

    protected function mainContent()
    {

        $thinks = '';
        foreach ($this->model->getFormFields() as $elemnt) {
            $thinks .=
                div(
                    class: 'gegevensElement',
                    content: div(
                        class: 'elementBlock',
                        content:  $elemnt['name']
                    ) . div(
                        class: 'elementBlock',
                        content: $elemnt['value']
                    )
                ) ;
                
        }
        $return_str = div(
            class: 'about',
            content:h1(content: 'We nemen Contact met U op'). $thinks
        );
        return   $return_str;
    }
}
