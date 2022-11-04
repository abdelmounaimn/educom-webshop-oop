<?php 
    require_once 'BasicDoc.php';
    class HomeDoc extends BasicDoc 
    { 
        public function __construct($model)
        { 
            parent::__construct($model);
        }       

        protected function mainContent() 
        {
            echo "home";
            print_r($this->model->getSessionManager());
            
           return "<p>Welkom <strong> " . ($this->model->getSessionManager()->isUserLoggedIn()?$this->model->getSessionManager()->getLoggedUserName():'') . 
            " </strong>in de home pagina </p>"; 
            
        }
    }
?>