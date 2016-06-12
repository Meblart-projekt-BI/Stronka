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

require 'PHPMailer/PHPMailerAutoload.php';

include_once "class/DB.class.php";
include_once "config.php";

$db = new DB($dbtype, $dbhost, $dbname, $dbuser, $dbpass);

if(isset($_POST['id_wiadomosci'])) {
    $wiadomosc = new Wiadomosc($db);

    echo($wiadomosc->getMsgTresc($_POST['id_wiadomosci']));
}
elseif(isset($_POST['id_wiadomosci1'])) {
    error_log(print_r($_POST, true), 0);
    for ($i = 1; $i <= 10; $i++) {
        if(isset($_POST['id_wiadomosci'.$i]))
        {
            $wiadomosc = new Wiadomosc($db);
            $wiadomosc->usunWiadomosc($_POST['id_wiadomosci'.$i]);
        }
    }
    echo(1);
}
else
{
    $email = htmlspecialchars($_POST['email']);
    $temat = htmlspecialchars($_POST['temat']);
    $text = htmlspecialchars($_POST['tresc']);
    $mail = new PHPMailer;
    //$mail->SMTPDebug = 3;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'poczta.o2.pl';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'meblart@o2.pl';                 // SMTP username
    $mail->Password = 'qwert6';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('meblart@o2.pl', 'Meblart');
    $mail->addAddress($email);

    $text = str_replace("\n.", "\n..", $text);
    $mail->Subject = $temat;
    $mail->Body    = $text;

    if($mail->send())
        echo(1);
    else
        echo("Wystąpił błąd: " . $mail->ErrorInfo);
}


