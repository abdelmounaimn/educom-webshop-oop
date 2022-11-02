<?php
include 'BasicComponents.php';
class HtmlDoc
{

    protected function bodyContent()
    {
    }

    protected  function headContent()
    {
    }
    private function htmlContent()
    {
        return html(head(content: $this->headContent()) . body(content: $this->bodyContent(), class: 'body'));
    }
    public function show()
    {
        echo $this->htmlContent();
    }
}
