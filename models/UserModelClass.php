<?php
include_once "models/PageModelClass.php";
include_once "models/FormModel.php";
include_once "database/database_repository.php";
class UserModelClass extends PageModelClass
{


    private $id;
    private $name = array('name' => 'name' , 'value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'text', 'regEx' => '/^[a-zA-Z-_\']{1,60}$/', 'label' => 'jouw naam');
    private $email = array('name' => 'email' ,'value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'email', 'regEx' => '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', 'label' => 'jouw email');
    private $password = array('name' => 'password' ,'value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'password', 'regEx' => '/.{2,100}/', 'label' => 'jouw wachtwoord');
    private $password2 = array('name' => 'password2' ,'value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'password', 'regEx' => '/.{2,100}/', 'label' => 'Herhaal jouw wachtwoord');
    private $isValid = false;
    private $formFields = array('naam', 'email', 'wachtwoord', 'herhaaldWachtwoord');
    private $formHeader = array('login' => "Loggin ", 'register' => 'Registreren');
    private $formDescription = array('login' => "vul jouw inlog gegevens in ", 'register' => 'maak een profiel');
    private $formButton = array('login' => "Login ", 'register' => 'registreer');
    private $formModel = null;
    //pasword 2 regEx = isset($_POST['wachtwoord']) ? '/' . $_POST['wachtwoord'] . '$/' : '/.{2,100}/'

    public function __construct($Model)
    {
        // echo "<BR> UserModelS<BR>";
        parent::__construct($Model);
        $this->formModel= new FormModel($Model);
        
    }



    public function generateFormElement()
    {
        if ($this->getPage() == 'login') {
            if ($this->getIsPost()) {

                echo "<BR> POST ONTVANGEN <BR>";
                $this->formModel->setFormHeader($this->formHeader['login']);
                $this->formModel->setFormDescription($this->formDescription['login']);
                $this->formModel->setFormButton($this->formButton['login']);
                $this->formModel->setFormFields(array($this->email,$this->password));
            } else {
                $this->formModel->setFormHeader($this->formHeader['login']);
                $this->formModel->setFormDescription($this->formDescription['login']);
                $this->formModel->setFormButton($this->formButton['login']);
                $this->formModel->setFormFields(array($this->email,$this->password));
            }
        }
    }

    public function validateLogin()
    {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') $data = $this->setUpDAtaFromPost(array($this->email, $this->password));

        if ($this->isValid) {

            $user = $this->findUserByEmail($this->email['value']);
            if ($user != null && strcmp($_POST['password'], $user['wachtwoord']) == 0) {
                $this->getSessionManager()->userLogin($user);
            } else {
                $this->email['error'] =  'inlog gegevens niet valid';
                //echo 'inlog gegevens niet valid';
                $this->isValid = false;
            }
        }else {
            //print_r($this->email);
        }

    }
    private function findUserByEmail($email){
  return findUserByEmail($email);

    }

    private function setupData($colnaam, $value = '', $metaData)
    {

        if (array_key_exists("regEx", $metaData)) {
            if (preg_match($metaData['regEx'], trim($value))) {
                $this->$colnaam['value'] = $value;
            } else {
                $this->isValid = false;
                $this->$colnaam['error'] = $colnaam . ' is niet correct';
                $this->$colnaam['value'] = $value;
            }
        } else if (array_key_exists("options", $metaData)) {
            if (!array_key_exists($value, $metaData['options'])) {
                $this->isValid = false;
                $this->$colnaam['error'] = $colnaam . ' is not a valid option';
            }


            $this->$colnaam['value'] = $value;
        }
        
    }

    private function setUpDAtaFromPost($elements)
    {
        $this->isValid = true;
        foreach ($elements as $elemnt) {
            $this->setupData($elemnt['name'], isset($_POST[$elemnt['name']]) ? $_POST[$elemnt['name']] : '', $elemnt);
        }
        
    }




    public function getForm()
    {
        $this->generateFormElement();
        return $this->form;
    }



    public function doLoginUser()
    {
    }



    /**
     * Get the value of isValid
     */
    public function getIsValid()
    {
        return $this->isValid;
    }

    /**
     * Get the value of form
     */

    /**
     * Get the value of formModel
     */ 
    public function getFormModel()
    {
        $this->generateFormElement();
        return $this->formModel;
    }

    /**
     * Set the value of formModel
     *
     * @return  self
     */ 
    public function setFormModel($formModel)
    {
        $this->formModel = $formModel;

        return $this;
    }
}
