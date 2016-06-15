<?php
session_start();
define('INDEX_DIR', __DIR__);

function autoload($className) {
    $classFileName = INDEX_DIR."/class/$className.class.php";
    if (is_file($classFileName)) {
        require_once($classFileName);
    }
}
spl_autoload_register("autoload");

include_once "config.php";

$db = new DB($dbtype, $dbhost, $dbname, $dbuser, $dbpass);

$produkt = new Product($db);
if(isset($_POST['id']) && isset($_POST['status'])) {
    $produkt->updateStatusZamowienia($_POST['id'], $_POST['status']);
    echo(1);
}

