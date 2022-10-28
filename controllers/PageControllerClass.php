<?php
require_once("models/PageModelClass.php");

class PageControllerClass
{
    protected $model;
    public function __construct()
    {

        $this->model = new PageModelClass(NULL);
    }


    public function handleRequest()
    {
        $this->getRequest();

        $this->processRequest();

        $this->showResponse();
    }

    private function getRequest()
    {

        $this->model->getRequestedPage();
    }
    private function processRequest()
    {
        switch ($this->model->getPage()) {
            case 'login':
                include_once "models/UserModelClass.php";
                $this->model = new UserModelClass($this->model);
                $this->model->validateLogin();
                if ($this->model->getIsValid()) {
                    $this->model->doLoginUser();
                    $this->model->createMenu();
                    $this->model->setPage("home");
                } 
                break;
            case 'logout':
                $this->model->getSessionManager()->do_user_logout();
                $this->model->createMenu();
                break;
                /*
            case 'contact':
                $data = validateContact();
                if ($data['validForm']) {
                    $requested_page = 'thinks';
                }
                break;
            case 'register':
                $data = validateRegister();
                if ($data['validForm']) {
                    $data = validateLogin();
                    $requested_page = 'login';
                }
                break;
            case 'login':
                $this->model = new UserModel($this->model);
                $model->validateLogin();
                if ($model->valid) {
                    $this->model->doLoginUser();

                    $this->model->setPage("home");
                }
                break;
            case 'logout':
                do_user_logout();
                $requested_page = 'home';
                break;
            case 'detail':
                $data['productId'] = getUrlVar('id', "");
                break;
            case 'cart':
                $data = validateCart();
                $requested_page = $data['page'];
                break;
            case 'payment':
                $data = validatPayment();
                $requested_page = $data['page'];
                break;
                */
        }
    }
    private function showResponse()
    {
        $this->model->createMenu();
        $view = null;
        switch ($this->model->getPage()) {

            case "home":
                require_once "views/HomeDoc.php";
                $view = new HomeDoc($this->model);
                break;
            case 'login':
                require_once "views/FormsDoc.php";
                $view = new FormsDoc($this->model);
                break;
                case "about":
                    require_once "views/AboutDoc.php";
                    $view = new AboutDoc($this->model);
                    break;
            default:
                require_once "views/HomeDoc.php";
                $view = new HomeDoc($this->model);
        }




        $view->show();
    }
}
