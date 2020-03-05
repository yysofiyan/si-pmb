<?php
//koneksi.php
if (ereg("koneksi.php", $PHP_SELF))
{
header("location:./index.php");
die;
}

function opendb()
{
global $dbhost, $dbuser, $dbpassword, $dbname, $dbconnection;
$dbconnection=mysql_connect($dbhost,$dbuser,$dbpassword)
or die ("Gagal Membuka Database");
$dbselect=mysql_select_db($dbname);
}

function closedb()
{
global $dbconnection;
mysql_close($dbconnection);
}

function querydb($query)
{
$result=mysql_query($query) or die ("Gagal Melakukan Query = $query");
return $result;
}
?>