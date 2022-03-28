<?php

class Home extends Master_Page
{
    public string $title = "Home";
    public bool $connect_bd = true;

    public function Content()
    {
        $product = new Product();
        $prres = $product->Select(array("id", "name"));
        var_dump(\DBFunctions\DBGetError());

        global $CONFIG;
        $form = new Form("prueba", $CONFIG['links']['url'] . "/home", "POST", "_self", false, true);

        print $form->getFormStart();
        ?>
        <main>
            <input type="hidden" name="action" value="show_msj">
            <label>
                <input type="text" name="poto">
            </label>
            Hola mundo
            <button>submit</button>
            <?php
            while ($prrow = \DBFunctions\DBFetch($prres)) {
                print $prrow['name'] . "<br>";
            }
            ?>
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

    public function Actions($action)
    {
        if ($action == "show_msj") {
            ?>
            <script>alert("Holi");</script>
            <?php
        }
    }
}