<?php

session_start();
error_reporting(~E_NOTICE);

header('Content-Type: application/json');

define('INDEX_DIR', __DIR__);
print(__DIR__);

function autoload($className) {
    $classFileName = INDEX_DIR."/class/$className.class.php";

    if (is_file($classFileName)) {
        require_once($classFileName);
    }
}

spl_autoload_register("autoload");

$input = filter_input_array(INPUT_POST);

/* ustawienie zmiennych konfiguracyjnych */
include('config.php');
$db = new DB($dbtype, $dbhost, $dbname, $dbuser, $dbpass);


if($_SESSION['kierownik'])
{
    print "elo kierownik";
}
else
{
    session_destroy();
    header("Location: index.php");
}

print_r($input);

error_log(print_r($input, true), 0);

if ($input['action'] === 'edit') {
    $stm2 = $db->query("UPDATE pracownik set imie='" . $input['imie'] . "', nazwisko='" . $input['nazwisko'] . "', login='" . $input['login'] . "' WHERE id_pracownika='" . $input['id_pracownika'] . "'");
    //$mysqli->query("UPDATE users SET username='" . $input['username'] . "', email='" . $input['email'] . "', avatar='" . $input['avatar'] . "' WHERE id='" . $input['id'] . "'");
} else if ($input['action'] === 'delete') {
    $stm2 = $db->query("DELETE from pracownik WHERE id_pracownika='" . $input['id_pracownika'] . "'");
} else if ($input['action'] === 'restore') {
    //$mysqli->query("UPDATE users SET deleted=0 WHERE id='" . $input['id'] . "'");
}

echo json_encode($input);
