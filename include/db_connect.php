<?php
 
$db_host        ='localhost';
$db_user        ='root';
$db_pass        ='';
$db_database    ='sklep';


$link=mysql_connect($db_host,$db_user,$db_pass);

mysql_select_db($db_database,$link) or die ("Nie ma po��czenia z Baz�...".mysql_error());
mysql_query("SET names cp1251");

?>