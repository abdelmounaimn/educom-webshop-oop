
<?php

function validateContact()
{
    $data = array(
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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') $data = setUpDAtaFromPost($data);
    return $data;
}

function setUpDAtaFromPost($data)
{
    $data['validForm'] = true;
    foreach ($data['formFields'] as $key) {
        $data = setupData($data, $key, isset($_POST[$key]) ? $_POST[$key] : '', $data[$key]);
    }
    return $data;
}


function validateRegister()
{
    $data = array(
        'validForm' => false,
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') $data = setUpDAtaFromPost($data);
    if (!$data['validForm']) {
        return $data;
    } else {

        if (findUserByEmail($data['email']['value']) != null) {
            $data['email']['error'] = 'probeer ander wachtwoord';
            $data['validForm'] = false;
        } else {
            $user = array('naam' => $data['naam']['value'], 'email' => $data['email']['value'], 'wachtwoord' => $data['wachtwoord']['value']);
            saveUser($user);
            $data['validForm'] = true;
        }
    }
    return $data;
}

function validateLogin()
{
    $data = array(
        'validForm' => false,
        'page' => 'login',
        'formHeader' => 'Sign In',
        'formDescription' => 'vul jouw inlog gegevens in',
        'formFields' => array('email', 'wachtwoord'),
        'email' => array('value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'email', 'regEx' => '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', 'label' => 'jouw email'),
        'wachtwoord' => array('value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'password', 'regEx' => '/.{2,100}/', 'label' => 'jouw wachtwoord'),
        'formButton' => 'Login'
    );
    if ($_SERVER['REQUEST_METHOD'] == 'POST') $data = setUpDAtaFromPost($data);

    if ($data['validForm']) {

        $user = findUserByEmail($data['email']['value']);
        if ($user != null && strcmp($_POST['wachtwoord'], $user['wachtwoord']) == 0) {
            user_login($user);
        } else {
            $data['email']['error'] =  'inlog gegevens niet valid';
            $data['validForm'] = false;
        }
    }

    return $data;
}

function setupData($data, $colnaam, $value = '', $metaData)
{

    if (array_key_exists("regEx", $metaData)) {
        if (preg_match($metaData['regEx'], trim($value))) {
            $data[$colnaam]['value'] = $value;
        } else {
            $data['validForm'] = false;
            $data[$colnaam]['error'] = $colnaam . ' is niet correct';
            $data[$colnaam]['value'] = $value;
        }
    } else if (array_key_exists("options", $metaData)) {
        if (!array_key_exists($value, $metaData['options'])) {
            $data['validForm'] = false;
            $data[$colnaam]['error'] = $colnaam . ' is not a valid option';
        }


        $data[$colnaam]['value'] = $value;
    }
    return $data;
}

function validateCart()
{
    $data = array('page' => 'cart', 'cart' => null, 'productId' => -1);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        writInLog($_POST['submit']);
        switch ($_POST['submit']) {
            case 'Add':
                setUpCartElement(id: $_POST['cart']);
                $data['page'] = 'detail';

                break;
            case 'Setting':

                foreach ($_POST as $key => $val) {

                    if (is_int($key)) {
                        setUpCartElement(id: $key, nbrOfItems: $val);
                    }
                }
                $data['page'] = 'cart';
                break;
            case 'Order':
                $items = array();
                foreach ($_POST as $key => $val) {

                    if (is_int($key)) {
                         array_push($items, array ('id'=> $key , 'nbrOfItems' => $val));
                    }
                }
                $user = get_logged_user();
                $data['page'] = 'payment';
                $data['totalPrice'] =  $_POST['totalPrice'];
                $data['payment'] = addPaymentService($user['id'], $items , $_POST['totalPrice']);

                break;
            default:
                echo "default ";
        }
    }

    $data['cart'] = getCartElements();
    $data['productId'] = isset($_POST['cart']) ? $_POST['cart'] : -1;
    return $data;
}


function validatPayment()
{
    $data= null;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        resetCart();
        $data['page']= 'home';
    }else {
        echo 'payment .....';
    
    }
    return $data;
}
