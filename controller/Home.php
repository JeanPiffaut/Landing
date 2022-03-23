<?php

class Home extends Page
{
    public string $title = "Home";

    public function Content()
    {
        if(isset($_REQUEST['poto'])) {

            print $_REQUEST['poto'];
        }

        global $CONFIG;
        $form = new Form("prueba", $CONFIG['links']['url'] . "/index.php?page=home", "POST", "_self", false, true);

        print $form->getFormStart();
        ?>
        <label>
            <input type="text" name="poto">
        </label>
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