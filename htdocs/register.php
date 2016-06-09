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

$user->imie=htmlspecialchars($_POST['imie']);
$user->nazwisko=htmlspecialchars($_POST['nazwisko']);
$user->haslo=md5(htmlspecialchars($_POST['haslo']));
$user->email=htmlspecialchars($_POST['email']);
$user->login=htmlspecialchars($_POST['login']);

$user->create();
