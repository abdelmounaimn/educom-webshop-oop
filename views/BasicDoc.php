<?php
require_once 'HtmlDoc.php';
require_once 'models/PageModelClass.php';
include_once("sessionManager/SessionManager.php");
class BasicDoc extends HtmlDoc
{
    protected $model;
    

    public function __construct($model)
    {
        
        $this->model= $model;
        
    }

    protected function title()
    {
        return title(content: $this->model->getPage());
    }

    private function metaAuthor()
    {
        return meta(name: "author", content: 'Abdel');
    }

    private   function cssLinks()
    {
        return h_link(rel: 'stylesheet', href: '/educom-webshop-oop/css/stylesheet.css');
    }

    private   function bodyHeader()
    {
        return h1($this->model->getBodyHeader());
    }

    private   function mainMenu()
    {
    
        $elemnts='' ;
        $menu =$this->model-> getMenu();
        foreach ($menu as $menu => $href) {
            $elemnts .= li(class: 'navElement', content: a(href: $href, content: $menu, class: ''));
        }
        return ul(class: 'navLijst', content: $elemnts);
    }
    protected function mainContent()
    {

    }
    private   function bodyFooter()
    {
        return div(class: 'footer', content: div(content: '&nbsp; &copy; 2022, Abdel', class: ''));
    }

    // Override function from htmlDoc
    protected function headContent()
    {
        return $this->title() .
            $this->metaAuthor() .
            $this->cssLinks();
    }

    // Override function from htmlDoc
    protected function bodyContent()
    {
        return div(class: 'bodyContent', content: $this->mainMenu() .
            div(class: 'content', content: $this->bodyHeader() .
                $this->mainContent()). $this->bodyFooter());
    }
}
