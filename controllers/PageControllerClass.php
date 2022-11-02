<?php
require_once("models/PageModelClass.php");
require_once "utils/Utils.php";
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
            case 'about':
                if ($this->model->getSessionManager()->isUserLoggedIn()) {
                    include_once "models/UserModelClass.php";
                    $this->model = new UserModelClass($this->model);
                    $user = $this->model->getSessionManager()->getLoggedUser();
                    $this->model->setNameVal($user['name']);
                    $this->model->setEmailVal($user['email']);
                } else $this->model->setPage("home");
                break;
            case 'register':
                include_once "models/UserModelClass.php";
                $this->model = new UserModelClass($this->model);
                $this->model->validateRegister();
                if ($this->model->getIsValid()) {
                    $this->model->setFormFields(array($this->model->getEmail(), $this->model->getPassword()));
                    $this->model->setPage("login");
                }
                break;
            case 'contact':
                include_once "models/FormModel.php";
                $this->model = new FormModel($this->model);
                $this->model->validateContact();
                if ($this->model->getIsValid()) {
                    $this->model->setPage("thinks");
                }
                break;
            case 'webshop':
                include_once "models/ShopModel.php";
                $this->model = new ShopModel($this->model);
                $this->model->getProductsFromDb();
                break;
            case 'cart':
                $page = Util::validateCart();
                break;
            case 'detail':
                $id = Util::addElementToCart();
                include_once "models/ShopModel.php";
                $this->model = new ShopModel($this->model);
                $this->model->getProductById($id);
                break;
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
            case 'register':
                require_once "views/FormsDoc.php";
                $view = new FormsDoc($this->model);
                break;
            case 'contact':
                require_once "views/FormsDoc.php";
                $view = new FormsDoc($this->model);
                break;
            case 'thinks':
                require_once "views/ThinksDoc.php";
                $view = new ThinksDoc($this->model);
                break;
            case 'webshop':
                require_once "views/WebshopDoc.php";
                $view = new WebshopDoc($this->model);
                break;
            case 'detail':
                require_once "views/ProductDetailDoc.php";
                $view = new ProductDetailDoc($this->model);
                break;
            case 'cart':
                require_once "views/CartDoc.php";
                $view = new CartDoc($this->model);
                break;
            case 'payment':

            default:
                require_once "views/HomeDoc.php";
                $view = new HomeDoc($this->model);
        }
        $view->show();
    }
}
