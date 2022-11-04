<?php
include_once "models/FormModel.php";
include_once "database/UserCrud.php";
require_once "models/classes/User.php";

class UserModelClass extends FormModel
{
    private $user;
    // dat kan vraag zijn 
    // ik kan geen geen model van maken om dat geen leeg constructor kan maken

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
            $userCrud = new UserCrud($this->crud);
            $user = $userCrud->readUserByEmail($this->email['value']);

            if ($user != null && strcmp($_POST['password'], $user->getPassword()) == 0) {
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
            $userCrud = new UserCrud($this->crud);
            
            $user = $userCrud->readUserByEmail($this->email['value']);
            if ($user != null) {
                $this->email['error'] =  'probeer ander email!!';
                $this->isValid = false;
            } else {
                $user = new User();
                $user->setUser(name: $this->name['value'], email: $this->email['value'], password: $this->password['value']);
                try{
                    $userCrud->createUser($user);
                }catch(Exception $e){
                    echo $e->getMessage();
                }
                
            }
        } else {
        }
    }

    private function saveUser()
    {

        $userCrud = new UserCrud($this->model->getCrud());
        $user = new User();
        $user->setUser(name: $this->name['value'], email: $this->email['value'], password: $this->password['value']);
        $userCrud->createUser($user);
        //saveUser(array('name' => $this->name['value'], 'email' => $this->email['value'], 'password' => $this->password['value']));
    }

    private function findUserByEmail($email)
    {
        return findUserByEmail($email);
    }

    public function doLoginUser()
    {
    }
}
