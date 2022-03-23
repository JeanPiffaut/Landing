<?php

include_once dirname(__FILE__) . "/../config.php";
include_once dirname(__FILE__) . "/Head.php";

class Page
{
    private Head $head;
    private string $page_lang = "es";

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
        <!DOCTYPE html>
        <html lang="<?= $this->page_lang; ?>">
        <?php
        $head->PrintHead();
        ?>
        <body>
        <?php

        // Set header output
        ob_start();
        $this->Header();
        $header = ob_get_contents();
        ob_end_clean();

        if (empty($header) == false) {
            ?>
            <header>
                <?= $header; ?>
            </header>
            <?php
        }

        // Set content output
        ob_start();
        $this->Content();
        $content = ob_get_contents();
        ob_end_clean();

        if (empty($content) == false) {
            ?>
            <main>
                <?= $content; ?>
            </main>
            <?php
        }

        // Set footer output
        ob_start();
        $this->Footer();
        $footer = ob_get_contents();
        ob_end_clean();

        if (empty($footer) == false) {
            ?>
            <footer>
                <?= $footer; ?>
            </footer>
            <?php
        }
        ?>
        </body>
        </html>
        <?php
    }

    protected function Content()
    {
    }

    protected function Header()
    {
        ?>
        Este es el master header
        <?php
    }

    protected function Footer()
    {
        ?>
        Este es el master footer
        <?php
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