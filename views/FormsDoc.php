<?php
require_once 'BasicDoc.php';

class FormsDoc extends BasicDoc
{
    public function __construct($model)
    {
        //$this->model = $myData;
        parent::__construct($model);
    }

    protected function mainContent()
    {
        //var_dump($this->model);
        return $this->buildFormElements($this->model);
    }

    function buildFormElements($model)
    {

        $header = h1($model->getFormHeader()) . p($model->getFormDescription()) . hr();
        $formElements = '';
        foreach ($model->getFormFields() as $key) {
            //var_dump($key);
            $field = $key;
            $spn = span('errSapn', $field['error']);
            $formElement = '';
            switch ($field['type']) {
                case 'select':
                    $formElement .= select(name: $field['name'], value: $field['value'], class: 'inputText', required: 'required', options: $field['options']);
                    break;
                case 'radio':
                    foreach ($field['options'] as $opt => $val) {
                        $optId = $field['name'] . '_' . $opt;
                        $rad = input('radio', $optId, value: $opt, name: $field['name'], class: '', content: $val, checked: ($field['value'] == $opt));
                        $formElement .= label($optId, content: $rad);
                    }
                    break;
                case 'textarea':
                    $formElement .= textarea(class: 'messageArea', id: $field['name'], name: $field['name'], message: $field['value']);
                    break;
                default:
                    $formElement .= input(type: $field['type'], id: $field['name'], value: $field['value'], name: $field['name'], checked: false, class: 'inputText', placeholder: $field['label']);
                    break;
            }
            $formElements .= label($field['name'], content: $field['label'] .  ' ' . $spn . $formElement);
        }


        $hiddenELement = input(type: 'hidden', id: 'page', value: $model->getPage(), name: 'page');
        $submitButton = input(type: 'submit',  value: $model->getFormButton(),  class: 'submit clearfix');
        $form = form(id: '', action: 'index.php', method: 'POST', content: $formElements . $hiddenELement . $submitButton);
        $formpage = div($class = $model->getPage(), $content = $header . $form);

        return $formpage;
    }
}
