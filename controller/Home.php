<?php

class Home extends Page
{
    public string $title = "Home";

    public function Content()
    {
        if (isset($_REQUEST['poto'])) {
            print $_REQUEST['poto'];
        }

        global $CONFIG;
        $form = new Form("prueba", $CONFIG['links']['url'], "POST", "_self", false, true);

        print $form->getFormStart();
        ?>
        <main>
            <label>
                <input type="text" name="poto">
            </label>
            Hola mundo
            <button>submit</button>
        </main>
        <?php
        print $form->getFormEnd();
    }

    public function Footer()
    {
        ?>
        <footer>Este es el footer del Home</footer>
        <?php
    }
}