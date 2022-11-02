<?php
include_once "models/UserModelClass.php";
class FormModel extends PageModelClass
{
    protected $formHeader = array('value' => '', 'login' => "Loggin ", 'register' => 'Registreren', 'contact' => "Contact", 'about' => 'About');
    protected $formDescription = array('value' => '', 'login' => "vul jouw inlog gegevens in ", 'register' => 'maak een profiel', 'contact' => 'Jouw Contact gegevens : ', 'about' => 'About');
    protected $formButton = array('value' => '', 'login' => "Login ", 'register' => 'registreer', 'contact' => 'Contact', 'about' => 'About');
    protected $name = array('name' => 'name', 'value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'text', 'regEx' => '/^[a-zA-Z-_\']{1,60}$/', 'label' => 'jouw naam');
    protected $email = array('name' => 'email', 'value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'email', 'regEx' => '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', 'label' => 'jouw email');
    protected $password = array('name' => 'password', 'value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'password', 'regEx' => '/.{2,100}/', 'label' => 'jouw wachtwoord');
    protected $password2 = array('name' => 'password2', 'value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'password', 'regEx' => '/.{2,100}/', 'label' => 'Herhaal jouw wachtwoord');
    protected $aanhef = array('name' => 'aanhef', 'value' => '', 'error' => '', 'label' => 'Aanhef:', 'type' => 'select', 'required' => true, 'regEx' => '/dhr|mvr/', 'options' => array('dhr' => 'Dhr', 'mvr' => 'Mvr'));
    protected $telefoon = array('name' => 'telefoon', 'value' => '', 'error' => '', 'htmlElem' => 'input', 'type' => 'text', 'regEx' => '/^0[1-9][0-9]{8}$|^\+[1-9][0-9][1-9][0-9]{8}$/', 'label' => 'Telefoon:', 'placeholder' => 'jouw telefoon');
    protected $communicatievoorkeur = array('name' => 'communicatievoorkeur', 'value' => '', 'error' => '', 'label' => 'wat is jouw communicatievoorkeur?', 'type' => 'radio', 'required' => true, 'options' => array('email' => 'Email', 'telefoon' => 'Telefoon'));
    protected $message = array('name' => 'message', 'value' => '', 'error' => '', 'label' => 'Laat ons weten waarover je contact wil opnemen.', 'type' => 'textarea', 'regEx' => '/^.{2,1000}$/', 'rows' => 4, 'cols' => 50);
    protected $formFields = array();
    protected $isValid = false;

    public function __construct($model)
    {
        parent::__construct($model);
        $this->setFormModelForPage($this->getPage());
    }

    public function setFormModelForPage($page)
    {
        $this->formHeader = $this->formHeader[$page];
        $this->formDescription = $this->formDescription[$page];
        $this->formButton = $this->formButton[$page];
        switch ($page) {
            case 'login':
                $this->formFields = array(
                    &$this->email,
                    &$this->password
                );
                break;
            case 'register':
                $this->formFields = array(
                    &$this->name,
                    &$this->email,
                    &$this->password,
                    &$this->password2
                );
                break;
            case 'contact':
                $this->formFields = array(
                    &$this->aanhef,
                    &$this->name,
                    &$this->email,
                    &$this->telefoon,
                    &$this->communicatievoorkeur,
                    &$this->message
                );
            default;
        }
    }

    public function validateContact()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->setUpDAtaFromPost($this->formFields);
        }
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

    protected function setUpDAtaFromPost($elements)
    {
        $this->isValid = true;
        foreach ($elements as $elemnt) {
            $this->setupData($elemnt['name'], isset($_POST[$elemnt['name']]) ? $_POST[$elemnt['name']] : '', $elemnt);
        }
    }

    public function getIsValid()
    {
        return $this->isValid;
    }


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

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of formHeader
     */
    public function getFormHeader()
    {
        return $this->formHeader;
    }

    /**
     * Get the value of formDescription
     */
    public function getFormDescription()
    {
        return $this->formDescription;
    }

    /**
     * Get the value of formButton
     */
    public function getFormButton()
    {
        return $this->formButton;
    }
}
