<?php

include_once dirname(__FILE__) . "/../model/Page.php";
include_once dirname(__FILE__) . "/../model/Form.php";

class Home extends Page
{
    public string $title = "Home";

    public function Content()
    {
        if(isset($_REQUEST['poto'])) {

            print $_REQUEST['poto'];
        }
        $form = new Form("prueba", "/index.php?page=home", "GET", "_self", false, true);

        print $form->getFormStart();
        ?>
        <input type="text" name="poto">
        Hola mundo
        <button>submit</button>
        <?php
        print $form->getFormEnd();
    }

    public function Footer()
    {
        ?>
        Este es el footer del Home
        <?php
    }
}