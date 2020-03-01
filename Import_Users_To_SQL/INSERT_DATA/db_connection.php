<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "kodi_users";
try
{
$con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
echo "ERROR : ".$e->getMessage();
}
