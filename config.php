<?php
if (ereg("config.php", $PHP_SELF))
{
header("location:./index.php");
die;
}

$dbhost="localhost";
$dbname="";
$dbuser="root";
$dbpassword="root";
?>