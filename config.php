<?php

global $CONFIG;
$CONFIG = array();

// Links: Section in which you can list the different useful links within the web.
$CONFIG['links']['url'] = "http://localhost:8888/landing";
$CONFIG['links']['public_url'] = $CONFIG['links']['url'] . "/view";
$CONFIG['links']['style'] = $CONFIG['links']['public_url'] . "/css";
$CONFIG['links']['javascript'] = $CONFIG['links']['public_url'] . "/js";
$CONFIG['links']['image'] = $CONFIG['links']['public_url'] . "/image";

// Head general params
$CONFIG['head']['favicon'] = $CONFIG['links']['image'] . "/favicon.png";

// Style files
$CONFIG['style'][] = $CONFIG['links']['style'] . "/main.css";

// Javascript files
$CONFIG['javascript'][] = $CONFIG['links']['javascript'] . "/main.js";