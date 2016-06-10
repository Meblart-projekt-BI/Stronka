<?php
session_start();
error_reporting(~E_NOTICE);

/* zdefiniowanie głównego katalogu dla pliku index.php, względem tego katalogu będą realizowane wszystkie inne operacje dostępu do plików */
define('INDEX_DIR', __DIR__);


/**
 Aby móc korzystać z klas należy je włączyć do kodu, np. za pomocą funkcji require_once().
 Można też skorzystać z opcji autoloadera. Wówczas jeżeli danej klasy, do której się odwołujemy nie ma w systemie,
 to system PHP wywoła autoloadera, aby taką klasę dla niego załadował. Poniżej kod umożliwiający taką automatyczną akcję.
 W ten sposób w dużych projektach nie musimy pamiętać co gdzie ładować oraz co ważne, do pamięci są ładowane tylko te klasy,
 które są potrzebne.
 */

function autoload($className) {
    $classFileName = INDEX_DIR."/class/$className.class.php";

    if (is_file($classFileName)) {
        require_once($classFileName);
    }
}



spl_autoload_register("autoload");


/* ustawienie zmiennych konfiguracyjnych */
include_once('config.php');


/* utworzenie obiektu strony dla danego pliku widoku strony */
$page = new PageView($theme);


/* nawiązanie połączenia z bazą danych */
$db = new DB($dbtype, $dbhost, $dbname, $dbuser, $dbpass);


/* utworzenie obiektu kontorlera i przekazanie mu obiektu strony, aby mógł dodawać do tej strony elementy */
$controller = new Controller($page, $db);

/* wykonanie na kontrolerze akcji */
if ( isset($_GET['action']) ) {

	$action = $_GET['action'];
	$controller->$action();
}else{
    $controller->page();
}


/* wyrederowanie strony */
echo $page;
