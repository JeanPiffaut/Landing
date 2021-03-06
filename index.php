<?php

include_once dirname(__FILE__) . "/autoload.php";

global $ROUTER;
if (isset($_REQUEST['page']) && $_REQUEST['page'] != "") {
    $page_name = $_REQUEST['page'];
} else {
    $page_name = $ROUTER['default'];
}

if (isset($ROUTER['pages'][$page_name])) {
    $page_data = $ROUTER['pages'][$page_name];
} else {
    $page_data = $ROUTER['pages'][$ROUTER['not_found']];
}

include_once dirname(__FILE__) . "/controller/" . $page_data['file'];

$page = new $page_data['class']();

if (isset($_REQUEST['action']) && $_REQUEST['action'] != "") {

    $page->ExecuteActions($_REQUEST['action']);
}

$page->PrintPage();
exit();