<?php
define('INDEX_DIR', __DIR__);

function autoload($className) {
    $classFileName = INDEX_DIR."/class/$className.class.php";
    if (is_file($classFileName)) {
        require_once($classFileName);
    }
}
spl_autoload_register("autoload");

include_once "class/DB.class.php";
include_once "config.php";

$db = new DB($dbtype, $dbhost, $dbname, $dbuser, $dbpass);

$produkt = new Product($db);
$produkt->dodajProdukt();