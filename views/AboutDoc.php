<?php
require_once 'BasicDoc.php';

class AboutDoc extends BasicDoc
{
    public function __construct($model)
    {
        parent::__construct($model);
    }

    protected function mainContent()
    {

        $about =
            div(
                class: 'gegevensElement',
                content: div(
                    class: 'elementBlock',
                    content: 'Name'
                ) . div(
                    class: 'elementBlock',
                    content: $this->model->getNameVal()
                )
            ) .
            div(
                class: 'gegevensElement',
                content: div(
                    class: 'elementBlock',
                    content: 'Email'
                ) . div(
                    class: 'elementBlock',
                    content: $this->model->getEmailVal()
                )
            );
        $return_str = div(
            class: 'about',
            content: $about
        );
        return   $return_str;
    }
}
