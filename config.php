<?php

global $CONFIG;
$CONFIG = array();

// Links: Section in which you can list the different useful links within the web.
$CONFIG['links']['url'] = "http://localhost:88/Landing";
$CONFIG['links']['public_url'] = $CONFIG['links']['url'] . "/view";
$CONFIG['links']['style'] = $CONFIG['links']['public_url'] . "/css";
$CONFIG['links']['javascript'] = $CONFIG['links']['public_url'] . "/js";
$CONFIG['links']['image'] = $CONFIG['links']['public_url'] . "/image";

// DataBase: Parameters for creating database connections.
$CONFIG['database']['name'] = "";
$CONFIG['database']['host'] = "localhost";
$CONFIG['database']['port'] = "3306";
$CONFIG['database']['user'] = "root";
$CONFIG['database']['pass'] = "root";
$CONFIG['database']['socket'] = "/Applications/MAMP/tmp/mysql/mysql.sock";

// Head general params
$CONFIG['head']['favicon'] = $CONFIG['links']['image'] . "/favicon.png";

// Style files
$CONFIG['style'][] = $CONFIG['links']['style'] . "/main.css";

// Javascript files
$CONFIG['javascript'][] = $CONFIG['links']['javascript'] . "/main.js";


global $ROUTER;
$ROUTER = array();

$ROUTER['default'] = "home";
$ROUTER['not_found'] = "not_found";
$ROUTER['pages']['home'] = array(
    "name" => "home",
    "file" => "Home.php",
    "class" => "Home"
);
$ROUTER['pages']['not_found'] = array(
    "name" => "not_found",
    "file" => "Not_found.php",
    "class" => "Not_Found"
);
$ROUTER['pages']['about_us'] = array(
    "name" => "about_us",
    "file" => "About_Us.php",
    "class" => "About_Us"
);
