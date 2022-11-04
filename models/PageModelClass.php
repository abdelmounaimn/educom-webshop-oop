<?php
require_once "utils/Utils.php";
require_once "sessionManager/SessionManager.php";

class PageModelClass
{
    private $page = '';
    private $bodyHeader = '';
    protected $isPost = false;
    private $menu = array();
    private $errors = array();
    private $genericErr = '';
    protected $sessionManager;
    protected $crud;

    public function __construct($previousPage, $crud)
    {
        if (empty($previousPage)) {
            $this->sessionManager = new SessionManager();
            $this->crud = $crud;
        } else {
            $this->crud = $previousPage->crud;
            $this->setPage($previousPage->getPage());
            $this->setBodyHeader($previousPage->getBodyHeader());
            $this->setIsPost($previousPage->getIsPost());
            $this->setMenu($previousPage->getMenu());
            $this->setErrors($previousPage->getErrors());
            $this->setGenericErr($previousPage->getGenericErr());
            $this->sessionManager = $previousPage->getSessionManager();

        }
    }

    public function createMenu()
    {
        $menu = array();
        if ($this->sessionManager->isUserLoggedIn()) {
            $menu = array(
                'HOME' => 'index.php?page=home',
                'CONTACT' => 'index.php?page=contact',
                'ABOUT' => 'index.php?page=about',
                'WEBSHOP' => 'index.php?page=webshop',
                'LOGOUT' => 'index.php?page=logout',
                'CART' => 'index.php?page=cart'
            );
        } else {
            $menu = array(
                'HOME' => 'index.php?page=home',
                'CONTACT' => 'index.php?page=contact',
                'REGISTER' => 'index.php?page=register',
                'LOGIN' => 'index.php?page=login'
            );
        }
        $this->menu = $menu;
    }

    public function getRequestedPage()
    {
        $this->setIsPost(($_SERVER['REQUEST_METHOD'] == 'POST'));
        if ($this->getIsPost()) {
            $this->setPage(Util::getPostVar("page", "home"));
        } else {
            $this->setPage(Util::getUrlVar("page", "home"));
        }
    }


    /**
     * Get the value of page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set the value of page
     *
     * @return  self
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get the value of bodyHeader
     */
    public function getBodyHeader()
    {
        return $this->bodyHeader;
    }

    /**
     * Set the value of bodyHeader
     *
     * @return  self
     */
    public function setBodyHeader($bodyHeader)
    {
        $this->bodyHeader = $bodyHeader;

        return $this;
    }

    /**
     * Get the value of menu
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Set the value of menu
     *
     * @return  self
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get the value of isPost
     */
    public function getIsPost()
    {
        return $this->isPost;
    }

    /**
     * Set the value of isPost
     *
     * @return  self
     */
    public function setIsPost($isPost)
    {
        $this->isPost = $isPost;

        return $this;
    }

    /**
     * Get the value of errors
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set the value of errors
     *
     * @return  self
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;

        return $this;
    }

    /**
     * Get the value of genericErr
     */
    public function getGenericErr()
    {
        return $this->genericErr;
    }

    /**
     * Set the value of genericErr
     *
     * @return  self
     */
    public function setGenericErr($genericErr)
    {
        $this->genericErr = $genericErr;

        return $this;
    }

    /**
     * Get the value of sessionManager
     */
    public function getSessionManager()
    {
        return $this->sessionManager;
    }

    /**
     * Set the value of sessionManager
     *
     * @return  self
     */
    public function setSessionManager($sessionManager)
    {
        $this->sessionManager = $sessionManager;

        return $this;
    }

    /**
     * Get the value of crud
     */
    public function getCrud()
    {
        return $this->crud;
    }

    /**
     * Set the value of crud
     *
     * @return  self
     */
    public function setCrud($crud)
    {
        $this->crud = $crud;

        return $this;
    }
}
