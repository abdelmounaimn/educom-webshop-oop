<?php
include_once "models/UserModelClass.php";
class FormModel extends PageModelClass{
    private $formHeader='formHeader';
    private $formDescription ='formDescription';
    private $formFields=array();
    private $formButton ='formButton';
    public function __construct($model)
    {
        
        // echo "<BR> UserModelS<BR>";
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