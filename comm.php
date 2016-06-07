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

include_once "class/DB.class.php";
include_once "config.php";
include_once "class/Comment.class.php";

$db = new DB($dbtype, $dbhost, $dbname, $dbuser, $dbpass);


$comm = new Comment($db);

$comm->user = $_POST['nick'];
$comm->comment = $_POST['comment'];
$comm->newsid = $_POST['newsid'];
$comm->commentId = $_POST['comm_id'];

if ($_SESSION['login'] == 'yes') {
    $comm->userid = $_SESSION['id'];
}

if($_GET['edit'] == 'yes')
{
    $comm->update();
}else {
    $comm->create();
}