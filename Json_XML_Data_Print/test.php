<?php
ob_start();
date_default_timezone_set('Europe/Tirane');
ini_set("user_agent","Mozilla/5.0 (SmartHub; SMART-TV; U; Linux/SmartTV; Maple2012) AppleWebKit/534.7 (KHTML, like Gecko) SmartTV Safari/534.7");
@ini_set("default_socket_timeout", 10);
define("USER_AGENT",  $_SERVER['HTTP_USER_AGENT']); 
define("ROOT_PATH", dirname($_SERVER["SCRIPT_FILENAME"]) . '/');
define("WEBPATH", 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/');
define("IMGPATH", ROOT_PATH . 'image/');
define("INCLUDES_PATH", ROOT_PATH . "includes/");
define("FILES_PATH", ROOT_PATH . "data/");
/*
*****************************************
*        GET PHP ERROR LOGS             *
* REMOVE IF YOU DO NOT WISH TO GET LOGS *
*****************************************
*/
error_reporting(E_ALL ^ E_NOTICE);
ini_set("log_errors", "on");
ini_set("error_log", getcwd() . "ERRORS_LOGS.log");
/*
************
* INCLUDES *
************
*/
require INCLUDES_PATH . "json_xml.php"; // < Local xml & Remote, json from local only >
//require INCLUDES_PATH . "json.php"; // < REMOTE URL XML & JSON ONLY

$file = FILES_PATH . 'data/example.xml'; // LOCAL FILE
//$file = 'https://iptv.kodi.al/example.xml'; // REMOTE URL
$json = file_get_contents($file);
//$json = json_encode($json, JSON_PRETTY_PRINT);
header("Content-type: application/ld+json; charset=utf-8");

// strip off optional Unicode BOM:
//if (substr($json, 0, 3) == "\xEF\xBB\xBF") {
  //$json = substr($json, );
//}
echo htmlspecialchars_decode(json_format($json));
ob_end_flush();