<?php
include ("./../views/BasicComponents.php");
$files = scandir('./');
$testes = array_filter(
    $files,
    function ($test) {
        $regEx = '/^test_.*\.php$/';
        return preg_match($regEx, $test);
    }
);
array_map(function($el){
    echo div(content: '<BR>'.a(href:$el, content:$el, class:''), class: '');
},$testes);


