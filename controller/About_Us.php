<?php

class About_Us extends Master_Page
{
    public string $title = "About us";

    public function Content()
    {
        global $CONFIG;
        ?>
        <a href="<?= $CONFIG['links']['url'] ?>" target="_blank">inicio</a>
        Esta es la pagina sobre nosotros
        <?php
    }

    public function Header()
    {
        ?>
        Este es el header de la pagina sobre nosotros
        <?php
        parent::Header(); // TODO: Change the autogenerated stub
    }
}