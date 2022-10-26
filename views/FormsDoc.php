<?php
require_once 'BasicDoc.php';

class FormsDoc extends BasicDoc
{
    public function __construct($myData)
    {
        parent::__construct($myData);
    }

    protected function mainContent()
    {
        return $this->buildFormElements($this->data);
    }

    function buildFormElements($data)
    {
        $header = h1($data['formHeader']) . p($data['formDescription']) . hr();
        $formElements = '';
        foreach ($data['formFields'] as $key) {
            $field = $data[$key];

            $spn = span('errSapn', $field['error']);
            $formElement = '';
            switch ($field['type']) {
                case 'select':
                    $formElement .= select(name: $key, value: $field['value'], class: 'inputText', required: 'required', options: $field['options']);
                    break;
                case 'radio':
                    foreach ($field['options'] as $opt => $val) {
                        $optId = $key . '_' . $opt;
                        $rad = input('radio', $optId, value: $opt, name: $key, class: '', content: $val, checked: ($field['value'] == $opt));
                        $formElement .= label($optId, content: $rad);
                    }
                    break;
                case 'textarea':
                    $formElement .= textarea(class: 'messageArea', id: $key, name: $key, message: $field['value']);
                    break;
                default:
                    $formElement .= input(type: $field['type'], id: $key, value: $field['value'], name: $key, checked: false, class: 'inputText', placeholder: $field['label']);
                    break;
            }
            $formElements .= label($key, content: $field['label'] .  ' ' . $spn . $formElement);
        }


        $hiddenELement = input(type: 'hidden', id: 'page', value: $data['page'], name: 'page');
        $submitButton = input(type: 'submit',  value: $data['formButton'],  class: 'submit clearfix');
        $form = form(id: '', action: 'index.php', method: 'POST', content: $formElements . $hiddenELement . $submitButton);
        $formpage = div($class = $data['page'], $content = $header . $form);

        return $formpage;
    }
}
