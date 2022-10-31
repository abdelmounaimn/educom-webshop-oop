<?php
include_once "models/PageModelClass.php";
include_once "models/FormModel.php";
include_once "database/database_repository.php";
class UserModelClass extends FormModel
{
    private $id;
    private $name = array('name' => 'name', 'value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'text', 'regEx' => '/^[a-zA-Z-_\']{1,60}$/', 'label' => 'jouw naam');
    private $email = array('name' => 'email', 'value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'email', 'regEx' => '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', 'label' => 'jouw email');
    private $password = array('name' => 'password', 'value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'password', 'regEx' => '/.{2,100}/', 'label' => 'jouw wachtwoord');
    private $password2 = array('name' => 'password2', 'value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'password', 'regEx' => '/.{2,100}/', 'label' => 'Herhaal jouw wachtwoord');
    private $isValid = false;
    private $formFields = array();


    public function __construct($Model)
    {
        parent::__construct($Model);
        $this->generateFormElement();
    }



    public function generateFormElement()
    {
        if ($this->getPage() == 'login') {
            $this->formFields = array(&$this->email, &$this->password);
            if ($this->getIsPost()) {
                $this->setFormHeader($this->formHeader['login']);
                $this->setFormDescription($this->formDescription['login']);
                $this->setFormButton($this->formButton['login']);
            } else {
                $this->setFormHeader($this->formHeader['login']);
                $this->setFormDescription($this->formDescription['login']);
                $this->setFormButton($this->formButton['login']);
            }
        }

        if ($this->getPage() == 'register') {
            $this->formFields = array(&$this->name, &$this->email, &$this->password, &$this->password2);
            $this->setFormHeader($this->formHeader['login']);
            $this->setFormDescription($this->formDescription['login']);
            $this->setFormButton($this->formButton['login']);
        }
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

    /**
     * Get the value of name
     */
    public function getNameVal()
    {
        return $this->name['value'];
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setNameVal($nameVal)
    {
        $this->name['value'] = $nameVal;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmailVal()
    {
        return $this->email['value'];
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmailVal($emailVal)
    {
        $this->email['value'] = $emailVal;

        return $this;
    }

    /**
     * Get the value of formFields
     */
    public function getFormFields()
    {
        return $this->formFields;
    }

    /**
     * Set the value of formFields
     *
     * @return  self
     */
    public function setFormFields($formFields)
    {
        $this->formFields = $formFields;

        return $this;
    }
}
