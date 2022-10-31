<?php
include_once "models/UserModelClass.php";
class FormModel extends PageModelClass
{
    protected $formHeader = array('login' => "Loggin ", 'register' => 'Registreren', 'contact' => "Contact");
    protected $formDescription = array('login' => "vul jouw inlog gegevens in ", 'register' => 'maak een profiel');
    protected $formButton = array('login' => "Login ", 'register' => 'registreer');
    public function __construct($model)
    {
        parent::__construct($model);
    }

    /**
     * Get the value of formHeader
     */
    public function getFormHeader()
    {
        return $this->formHeader;
    }

    /**
     * Set the value of formHeader
     *
     * @return  self
     */
    public function setFormHeader($formHeader)
    {
        $this->formHeader = $formHeader;

        return $this;
    }

    /**
     * Get the value of formDescription
     */
    public function getFormDescription()
    {
        return $this->formDescription;
    }

    /**
     * Set the value of formDescription
     *
     * @return  self
     */
    public function setFormDescription($formDescription)
    {
        $this->formDescription = $formDescription;

        return $this;
    }

    

    /**
     * Get the value of formButton
     */
    public function getFormButton()
    {
        return $this->formButton;
    }

    /**
     * Set the value of formButton
     *
     * @return  self
     */
    public function setFormButton($formButton)
    {
        $this->formButton = $formButton;

        return $this;
    }
}
