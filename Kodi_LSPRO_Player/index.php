<?php

/*
 ┌────────────────────────────────────────────────────────────┐
 |  For More Modules Or Updates Stay Connected to Kodi dot AL |
 └────────────────────────────────────────────────────────────┘
 ┌───────────┬────────────────────────────────────────────────┐
 │ Package   │ Kodi Builder                                   │
 │ Version   │ 2.1                                            │
 │ Support   │ KODI Structure                                 │
 │ Drive     │ SQLI                                           │
 │ PHP Ver   │ 5.X.X - 7.X.X                                  │
 │ Licence   │ MIT                                            │
 │ Author    │ Olsion Bakiaj                                  │
 │ Email     │ TRC4@USA.COM                                   │
 │ Author    │ Endrit Pano                                    │
 │ Email     │ INFO@ALBDROID.AL                               │
 │ Website   │ https://kodi.al                                │
 │ Facebook  │ /albdroid.official/                            │
 │ Github    │ github.com/SxtBox                              │
 │ Created   │ 12/08/2019                                     │
 │ Modified  │ 06/03/2020                                     │
 └────────────────────────────────────────────────────────────┘
 NOTE
 TO USE THIS YOU NEED [live streamspro] KODI PLUGIN
 Addon Host: https://addons.kodi.al/
 DirectLink: https://addons.kodi.al/LiveStreamsPro.zip
*/

ob_start();
date_default_timezone_set("Europe/Tirane");
//error_reporting(0); // TURN ERRORS OFF
require_once('includes/Database_Conection.php');
require_once('includes/Kodi_Builder.php');

// GET HOST http://localhost/ FOLDER PATH /
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
  $protocol = 'http://';
} else {
  $protocol = 'https://';
}
// Get base URL
$ROOT_URL = $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . "/";
//echo $ROOT_URL;
// GET HOST

$MAIN_IMAGE = 'https://png.kodi.al/tv/albdroid/black.png'; // CHANGE WITH YOUR PHOTO
$KODI_SQL_DATA = array();
$KODI_SQL_QUERY = "SELECT * FROM `kodi_albania` ORDER BY `id` ASC"; // DESC ose ASC
$CALL_SQL_DATA = $GLOBALS['MYSQLI']->getAll($KODI_SQL_QUERY);
foreach ($CALL_SQL_DATA as $KODI_ROW => $KODI_INFO) {

$GET_ID = (int)$KODI_INFO['id'];
$KODI_SQL_DATA[$KODI_ROW]['id'] = $GET_ID;
$KODI_SQL_DATA[$KODI_ROW]['Title'] = $KODI_INFO['title'];
$KODI_SQL_DATA[$KODI_ROW]['Thumbnail'] = $KODI_INFO['thumbnail'];
$KODI_SQL_DATA[$KODI_ROW]['Link'] = $ROOT_URL . 'externallink.php?id=' . $GET_ID;
$KODI_SQL_DATA[$KODI_ROW]['Desc'] = $KODI_INFO['description'];
$KODI_SQL_DATA[$KODI_ROW]['DateTime'] = $KODI_INFO['added_date'];
}

$MAIN_KODI_NAME = "Kodi PHP STRUCTURE"; // MAIN KODI NAME
$data1 = date("l d/m/Y - H:i:s");
$data2 = date("l, d F Y - H:i:s");
$data3 = date("d F Y");
$viti = date("Y");

// KODI STRUCTURE
$STRUKTURA_FILLIM = <<<STRUKTURA_FILLIM
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<channel> <!-- KODI SQL STRUCTURE -->
<name>[COLOR lime][B]{$MAIN_KODI_NAME}[/B][/COLOR]</name>
<thumbnail>https://png.kodi.al/tv/albdroid/black.png</thumbnail>
<fanart>https://png.kodi.al/tv/albdroid/black.png</fanart>
<items_info> <!-- THIS IS OPTIONAL -->
<title>[COLOR lime][B][I]Albdroid[/I][/B][/COLOR][COLOR lime] [B][I][COLOR red]([/COLOR]{$MAIN_KODI_NAME}[COLOR red])[/I][/B][/COLOR]</title>
<genre>[COLOR lime][B][I]Albdroid[/I][/B][/COLOR][COLOR lime] [B][I][COLOR red]([/COLOR]{$MAIN_KODI_NAME}[COLOR red])[/I][/B][/COLOR]</genre>
<description>[COLOR blue][B]Author:[/COLOR] [COLOR lime][B]Olsion Bakiaj[/B][/COLOR][COLOR red] &amp;[/COLOR][COLOR lime][B] Endrit Pano[/B][/COLOR]</description>
<thumbnail>https://png.kodi.al/tv/albdroid/black.png</thumbnail>
<fanart>https://png.kodi.al/tv/albdroid/black.png</fanart>
<date>[COLOR lime][B]{$data3}[/B][/COLOR]</date>
<credits>[COLOR lime]TRC4[/B][/COLOR]</credits>
<year>[COLOR lime][B]{$viti}[/B][/COLOR]</year>
</items_info>\n\n
STRUKTURA_FILLIM;
$STRUKTURA_FUND = <<<FUND
<SetViewMode>504</SetViewMode>

</channel>
FUND;
// KODI STRUCTURE

//echo $STRUKTURA_FILLIM;
//echo $STRUKTURA_FUND;

$GET_KODI_DATA = new Kodi_Structure_Builder();

header('Content-Type: text/xml; charset=utf-8');
echo $GET_KODI_DATA->Kodi_items_Builder($KODI_SQL_DATA, $STRUKTURA_FILLIM, $MAIN_IMAGE);
ob_end_flush();
?>