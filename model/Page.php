<?php

include_once dirname(__FILE__) . "/../config.php";
include_once dirname(__FILE__) . "/Head.php";

class Page
{
    private Head $head;
    private string $page_lang = "ES";

    protected string $title = "";
    protected string $description;

    public function __construct()
    {
        $this->setHead(new Head($this->getTitle()));
    }

    public function PrintPage()
    {
        $head = $this->getHead();

        ?>
        <html lang="<?= $this->page_lang; ?>">
        <?php
        $head->PrintHead();
        ?>
        <body>
        <?php
        $this->Header();
        $this->Content();
        $this->Footer();
        ?>
        </body>
        </html>
        <?php
    }

    protected function Content()
    {
        ?>
        <?php
    }

    protected function Header()
    {
    }

    protected function Footer()
    {
    }

    #region General params

    /**
     * @return Head
     */
    public function getHead(): Head
    {
        return $this->head;
    }

    /**
     * @param Head $head
     */
    public function setHead(Head $head): void
    {
        $this->head = $head;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    #endregion General params
}