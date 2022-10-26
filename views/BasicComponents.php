<?php
function html($head = '', $body = '')
{
    return '<!DOCTYPE html> <head>' . $head .
        '</head> <body>' . $body .
        '</body> <html>';
}
function head($content){
    return '<head >' . $content .' </head>';

}
function h_link($rel , $href){
    return '<link rel="' . $rel . '" href="' . $href . '" >';
}
function title($content){
    return '<title >' . $content .' </title>';
}
function script($content , $src){
    return '<script  src = "' . $src . '">' . $content .' </script>';
}
function body($content, $class){
    return  '<body class="' . $class . '" >' . $content .' </body>';
}

function input($type = 'text', $id = '', $value = '', $name = '', $class = '', $content = '', $checked = false, $placeholder = '', $min = null, $max = null)
{
    return '<input type="' . $type . '" ' . ($max != null ? ' max ="' . $max . '" '  : '') . ($min != null ? ' min ="' . $min . '" '  : '') .  ' id="' . $id . '" name="'  . $name . '" class="' . $class . '" value="' . $value . '"  ' .  ($checked  ? 'checked' : '') . ' placeholder="' . $placeholder . '"> ' . $content . '</input>';
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
function form($id = '', $action = '', $method = '', $content, $class = '')
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
function ul($class , $content){
    return '<ul  class ="' . $class . '" >' . $content . '</ul>';
}
function li($class , $content){
    return '<li  class ="' . $class . '" >' . $content . '</li>';
}
function meta($name, $content)
{
    return '<meta name= "' . $name . '" content="' . $content . '">';
}
