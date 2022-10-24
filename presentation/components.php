<?php
function input($type = 'text', $id = '', $value = '', $name = '', $class = '', $content = '', $checked = false, $placeholder = '' , $min = null, $max = null)
{
    return '<input type="' . $type. '" ' . ($max != null ? ' max ="' . $max . '" '  : '') . ($min != null ? ' min ="' . $min . '" '  : '' ).  ' id="' . $id . '" name="'  . $name . '" class="' . $class . '" value="' . $value . '"  ' .  ($checked  ? 'checked' : '') . ' placeholder="' . $placeholder . '"> ' . $content . '</input>';
}
  


function label($for = '', $id = '', $class = '', $content = '')
{

    return '<label for="' . $for .  '" id="' . $id . '" class="' . $class . '"> ' . $content . '</label>';
}


function select($id = '', $name = '', $value = '', $class = '', $required = '', $options =
array('naam' => 'value'))
{
    $sel = '<select class="' . $class . '" id="' . $id . '" name="' . $name . '">';

    foreach ($options as $option_key => $option_value) {
        $selected = ($value == $option_key ? 'selected' : '');
        $sel .= '<option value="' . $option_key . '" ' . $selected . ' > ' . $option_value . '</option>';
    }
    $sel .= '</select>';
    return $sel;
}


function textarea($class = '', $id = '', $name = '', $message = '')
{
    return '<textarea class="' . $class . '" id="' . $id . '" name="' . $name . '" >' . $message . '</textarea>';
}

function div($class = '', $content = '')
{
    return '<div  class="' . $class . '" >' . $content . '</div>';
}
function h1($content)
{
    return '<h1>' . $content . '</h1>';
}
function p($content)
{
    return '<p>' . $content . '</p>';
}
function hr()
{
    return '<hr>';
}
function form($id = '', $action = '', $method = '', $content, $class='')
{
    return '<form id="' . $id . '" action="' . $action . '" method="' . $method . '" class="' . $class . '">' .  $content . '</form>';
}
function span($class, $content)
{

    return '<span class="' . $class . '">' . $content . '</span>';
}
function b($content = '')
{
    return '<b>' . $content . '</b>';
}
function img($src, $class, $alt)
{

    return '<img src = "' . $src . '" alt="' . $alt . '" class="' . $class . '">';
}
function a($href, $content, $class)
{
    return '<a href="' . $href . '" class ="' . $class . '" >' . $content . '</a>';
}

function buildFormElements($data)
{

    $formElements = '';
    foreach ($data['formFields'] as $key) {
        $field = $data[$key];

        $spn = span('errSapn', $field['error']);
        $formElement='';
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
        $formElements .=label($key, content: $field['label'] .  ' ' . $spn .$formElement);
    }
    return  $formElements;
}

function generateForm($data)
{
    $header = h1($data['formHeader']) . p($data['formDescription']) . hr();
    $formElements = buildFormElements($data);
    $hiddenELement = input(type: 'hidden', id: 'page', value: $data['page'], name: 'page');
    $submitButton = input(type: 'submit',  value: $data['formButton'],  class: 'submit clearfix');
    $form = form(id : '', action : 'index.php', method : 'POST', content: $formElements . $hiddenELement . $submitButton);
    $formpage = div($class = $data['page'], $content =$header. $form);

    return $formpage;
}
