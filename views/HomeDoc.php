<?php 
    require_once 'BasicDoc.php';
   
    class HomeDoc extends BasicDoc 
    { 
        public function __construct($myData)
        { 
            parent::__construct($myData);
        }       

        // Override function from basicDoc
        protected function mainContent() 
        {
           return "<p>dit is homepage</p>"; 
        }
    }
?>