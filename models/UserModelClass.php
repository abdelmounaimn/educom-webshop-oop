<?php
include_once "models/FormModel.php";
include_once "database/database_repository.php";
class UserModelClass extends FormModel
{
    private $id;
    public function __construct($Model)
    {
        parent::__construct($Model);
    }

    public function validateLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setUpDAtaFromPost(array($this->email, $this->password));
        }
        if ($this->isValid) {
            $user = $this->findUserByEmail($this->email['value']);
            if ($user != null && strcmp($_POST['password'], $user['wachtwoord']) == 0) {
                $this->getSessionManager()->userLogin($user);
            } else {
                $this->email['error'] =  'inlog gegevens niet valid';
                $this->isValid = false;
            }
        } else {
        }
    }

    public function validateRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->password2['regEx'] = (isset($_POST['password']) ? '/' . $_POST['password'] . '$/' : '/.{2,100}/');
            $this->setUpDAtaFromPost($this->formFields);
        }
        if ($this->isValid) {
            $user = $this->findUserByEmail($this->email['value']);
            if ($user != null) {
                $this->email['error'] =  'probeer ander email!!';
                $this->isValid = false;
            } else {
                $this->saveUser();
            }
        } else {
        }
    }

    private function saveUser()
    {
        saveUser(array('name' => $this->name['value'], 'email' => $this->email['value'], 'password' => $this->password['value']));
    }

    private function findUserByEmail($email)
    {
        return findUserByEmail($email);
    }

    public function doLoginUser()
    {
    }
}
