<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "xml_with_sql";

$con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);

// OR
//$con = new PDO("mysql:host=localhost;dbname=xml_with_sql", "root", "root");
?>