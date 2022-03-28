<?php

class Master_Page
{
    private Head $head;
    private string $page_lang = "es";
    protected bool $connect_bd = false;

    protected string $title = "";
    protected string $description;
    private string $action_results = "";

    public function __construct()
    {
        $this->setHead(new Head($this->getTitle()));

        if ($this->connect_bd === true) {
            global $CONFIG;
            \DBFunctions\DBConnect(
                $CONFIG['database']['host'],
                $CONFIG['database']['user'],
                $CONFIG['database']['pass'],
                $CONFIG['database']['name'],
                $CONFIG['database']['port'],
                $CONFIG['database']['socket']
            );
        }
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
            print $header;
        }

        // Set content output
        ob_start();
        $this->Content();
        $content = ob_get_contents();
        ob_end_clean();

        if (empty($content) == false) {
            print $content;
        }

        // Set footer output
        ob_start();
        $this->Footer();
        $footer = ob_get_contents();
        ob_end_clean();

        if (empty($footer) == false) {
            print $footer;
        }
        ?>
        </body>
        <?php

        $this->PrintActionResults();

        ?>
        </html>
        <?php
    }

    protected function Actions($action)
    {
    }

    public function ExecuteActions($action)
    {
        ob_start();
        $this->Actions($action);
        $action_prints = ob_get_contents();
        ob_end_clean();

        $this->action_results = $action_prints;
    }

    public function PrintActionResults()
    {
        print $this->action_results;
    }

    protected function Content()
    {
    }

    protected function Header()
    {
        ?>
        <header>Este es el master header</header>
        <?php
    }

    protected function Footer()
    {
        ?>
        <footer>Este es el master footer</footer>
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