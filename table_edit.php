<?php

session_start();
error_reporting(~E_NOTICE);

header('Content-Type: application/json');

define('INDEX_DIR', __DIR__);
//print(__DIR__);

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
/*
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
*/

//error_log(print_r($input['tab'], true), 0);
//error_log(print_r($input, true), 0);

if($input['typ'] === 'produkty')
{
    if ($input['action'] === 'edit') {
        $sql = "UPDATE produkt set nazwa_produktu='" . $input['nazwa_produktu'] . "', opis_produktu='" . $input['opis_produktu'] . "', image='" . $input['image'] . "' WHERE id_produktu='" . $input['id_produktu'] . "'";
    } else if ($input['action'] === 'delete') {
        $sql = "DELETE from produkt WHERE id_produktu='" . $input['id_produktu'] . "'";
    }
} else if($input['typ'] === 'klienci')
{
    if ($input['action'] === 'edit') {
        $sql = "UPDATE klient set imie='" . $input['imie'] . "', nazwisko='" . $input['nazwisko'] . "', login='" . $input['login'] . "', email='" . $input['email'] . "' WHERE id_klienta='" . $input['id_klienta'] . "'";
    } else if ($input['action'] === 'delete') {
        $sql = "DELETE from klient WHERE id_klienta='" . $input['id_klienta'] . "'";
    }
} else if($input['typ'] === 'pracownicy')
{
    if ($input['action'] === 'edit') {
        $sql = "UPDATE pracownik set imie='" . $input['imie'] . "', nazwisko='" . $input['nazwisko'] . "', login='" . $input['login'] . "', email='" . $input['email'] . "' WHERE id_pracownika='" . $input['id_pracownika'] . "'";
    } else if ($input['action'] === 'delete') {
        $sql = "DELETE from pracownik WHERE id_pracownika='" . $input['id_pracownika'] . "'";
    }
}

$stm2 = $db->query($sql);

echo json_encode($input);
