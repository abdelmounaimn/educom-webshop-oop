<?php
include ("./../views/BasicComponents.php");
$files = scandir('./');
$testes = array_filter(
    $files,
    function ($test) {
        $regEx = '/^test_.*\.php$/';
        return preg_match($regEx, $test);
    }
);
array_map(function($el){
    echo div(content: '<BR>'.a(href:$el, content:$el, class:''), class: '');
},$testes);

/*

class PageController {



   private $model;



   public function __construct() {

      $this->model = new PageModel(NULL);

   }



   public function handleRequest() {

      $this->getRequest();

	  $this->processRequest();

      $this->showResponse();

  }



  // from client

  private getRequest() {

      $this->model->getRequestedPage();

  }



  // business flow code

  private processRequest() {

      switch($this->model->page) {



      case "Login":

         $this->model = new UserModel

                                               ($this->model);

         $model->validateLogin()

         if ($model->valid) {

			 $this->model->doLoginUser();

             $this->model->setPage("home");

		 }

         break;

      ...

    }

  }

  // to client: presentatie laag

  private function showResponsePage() {

      $this->model->createMenu();



      switch($this->model->page) {

      case "Home":

         require_once("views/home_doc.php");

         $view = new HomeDoc($this->model);

         break;

      ...                     

      }

      $view->show();

   }

 */