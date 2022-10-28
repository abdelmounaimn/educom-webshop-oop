<?php 
    require_once 'BasicDoc.php';
   
    class AboutDoc extends BasicDoc 
    { 
        public function __construct($myData)
        { 
            parent::__construct($myData);
        }       

        protected function mainContent() 
        {

            $return_str='';

            $user = array();
            $user= $this->model->getSessionManager()->isUserLoggedIn()?$this->model->getSessionManager()->getLoggedUser() : array();
            foreach ($user as $key => $element) {
                if($key!='wachtwoord')$return_str .= div(class: 'gegevensElement', content: div(class:'elementBlock', content:$key).div(class:'elementBlock', content:$element));
              }
              $return_str = div(class: 'about', content:$return_str) ;
              return   $return_str; 
        }
    }
