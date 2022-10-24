<?php 
function showHomeBody(){
    $user_naam= is_user_logged_in()? '<h2> welkom <strong>'. get_logged_user_name() . '</strong></h2>': '';
    return '
<h1> Home Pagina </h1>'.
$user_naam ;
}