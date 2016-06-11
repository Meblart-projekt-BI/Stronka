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

$user = new User($db);
$data = array(
    'id_pracownika' => htmlspecialchars($_POST['id_pracownika']),
    'id_klienta' => 0,
    'imie' => '',
    'nazwisko' => '',
    'login' => '',
    'haslo' => 'maslowniczka25',
    'id_szefa' => 0,
    'id_magazynu' => 0,
    'email' => ''
);
$user->create($data, 'pracownik');