<?php

include_once "./../views/FormsDoc.php";
$data_login = array(
    'bodyHeader' => 'Login',
    'menu' => array('home' => 'index.php/page=home', 'contact' => 'index.php/page=contact'),
    'validForm' => false,
    'page' => 'login',
    'formHeader' => 'Sign In',
    'formDescription' => 'vul jouw inlog gegevens in',
    'formFields' => array('email', 'wachtwoord'),
    'email' => array('value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'email', 'regEx' => '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', 'label' => 'jouw email'),
    'wachtwoord' => array('value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'password', 'regEx' => '/.{2,100}/', 'label' => 'jouw wachtwoord'),
    'formButton' => 'Login'
);
$data_concact = array(
    'bodyHeader' => 'Contact',
    'menu' => array('home' => 'index.php/page=home', 'contact' => 'index.php/page=contact'),
    'validForm' => false,
    'formHeader' => 'Concact',
    'page' => 'contact',
    'formDescription' => 'vul dit formulier in',
    'formFields' => array('aanhef', 'naam', 'email', 'telefoon', 'communicatievoorkeur', 'message'),
    'aanhef' => array('value' => '', 'error' => '', 'label' => 'Aanhef:', 'type' => 'select', 'required' => true, 'options' => array('dhr' => 'Dhr', 'mvr' => 'Mvr')),
    'naam' => array('value' => '', 'error' => '', 'label' => 'Naam:', 'type' => 'text', 'regEx' => '/^[a-zA-Z-_\']{1,60}$/', 'placeholder' => 'jouw naam'),
    'email' => array('value' => '', 'error' => '', 'label' => 'Email:', 'type' => 'email', 'regEx' => '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', 'placeholder' => 'jouw email', 'checks' => array('validEmail')),
    'telefoon' => array('value' => '', 'error' => '', 'label' => 'Telefoon:', 'type' => 'text', 'regEx' => '/^0[1-9][0-9]{8}$|^\+[1-9][0-9][1-9][0-9]{8}$/', 'placeholder' => 'jouw telefoon'),
    'communicatievoorkeur' => array('value' => '', 'error' => '', 'label' => 'wat is jouw communicatievoorkeur?', 'type' => 'radio', 'required' => true, 'options' => array('email' => 'Email', 'telefoon' => 'Telefoon')),
    'message' => array('value' => '', 'error' => '', 'label' => 'Laat ons weten waarover je contact wil opnemen.', 'type' => 'textarea', 'regEx' => '/^.{2,1000}$/', 'rows' => 4, 'cols' => 50),
    'formButton' => 'sturen'
);

$data_register = array(
    'validForm' => false,
    'bodyHeader' => 'Register',
    'menu' => array('home' => 'index.php/page=home', 'contact' => 'index.php/page=contact'),
    'page' => 'register',
    'formFields' => array('naam', 'email', 'wachtwoord', 'herhaaldWachtwoord'),
    'formHeader' => 'Sign Up',
    'formDescription' => 'vul jouw inlog gegevens in',
    'naam' => array('value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'text', 'regEx' => '/^[a-zA-Z-_\']{1,60}$/', 'label' => 'jouw naam'),
    'email' => array('value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'email', 'regEx' => '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', 'label' => 'jouw email'),
    'wachtwoord' => array('value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'password', 'regEx' => '/.{2,100}/', 'label' => 'jouw wachtwoord'),
    'herhaaldWachtwoord' => array('value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'password', 'regEx' => isset($_POST['wachtwoord']) ? '/' . $_POST['wachtwoord'] . '$/' : '/.{2,100}/', 'label' => 'Herhaal jouw wachtwoord'),
    'formButton' => 'registreer'
);


$view = new FOrmsDoc($data_login);
$view->show();
