<?php
include("utils/Utils.php");
include_once("sessionManager/SessionManager.php");
class PageModelClass
{
    public $modelname = 'PageModelClass';
    private $page = '';
    private $bodyHeader = '';
    protected $isPost = false;
    private $menu = array();
    private $errors = array();
    private $genericErr = '';
    protected $sessionManager;




    public function showName()
    {
    }
    public function toString()
    {
        return  "page = " . $this->page . '<BR>' .
            "bodyHeader = " . $this->bodyHeader . '<BR>' .
            "isPost = " . (string)$this->isPost . '<BR>' .
            "genericErr = " . $this->genericErr . '<BR>' .
            "menu = " . (string)implode($this->menu) . '<BR>' .
            "errors = " . (string)implode($this->errors) . '<BR>';
    }

    public function __construct($previousPage)
    {

        if (empty($previousPage)) {
            $this->setSessionManager(new SessionManager());
            //$this->setMenu($this->createMenu());
        } else {
            $this->setPage($previousPage->getPage());
            $this->setBodyHeader($previousPage->getBodyHeader());
            $this->setIsPost($previousPage->getIsPost());
            $this->setMenu($previousPage->getMenu());
            $this->setErrors($previousPage->getErrors());
            $this->setGenericErr($previousPage->getGenericErr());
            $this->setSessionManager($previousPage->getSessionManager());
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
        $this->menu= $menu;
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
}
