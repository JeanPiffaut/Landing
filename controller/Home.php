<?php

include_once dirname(__FILE__) . "/../model/Page.php";

class Home extends Page
{
    public string $title = "Home";

    public function Content()
    {
        ?>
        Hola mundo
        <?php
    }

    public function Footer()
    {
        ?>
        Este es el footer del Home
        <?php
    }
}