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

error_log(print_r($_POST, true), 0);
$db->query("INSERT INTO pracownik(id_pracownika) VALUES('" . htmlspecialchars($_POST['id_pracownika']) . "')");
