<?php 
    require_once 'BasicDoc.php';
    class HomeDoc extends BasicDoc 
    { 
        public function __construct($myData)
        { 
            parent::__construct($myData);
        }       

        protected function mainContent() 
        {
            
           return "<p>Welkom <strong> " . ($this->model->getSessionManager()->isUserLoggedIn()?$this->model->getSessionManager()->getLoggedUserName():'') . 
            " </strong>in de home pagina </p>"; 
        }
    }
?>