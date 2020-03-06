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
//error_reporting(0);
require_once('includes/Database_Conection.php');

$GET_ID = (int)$_GET['id'];
if ($GET_ID > 0) {
$ROWS = $GLOBALS['MYSQLI']->getRow("SELECT * FROM `kodi_albania` WHERE `id`='{$GET_ID}'");

$TITLE = $ROWS['title'];
$LINK = $ROWS['link'];
$THUMBNAIL = $ROWS['thumbnail'];
$DESCRIPTION = $ROWS['description'];
$ADDED_DATE = $ROWS['added_date'];

$MAIN_KODI_NAME = "Kodi PHP STRUCTURE";
$albdroidlogo = "https://png.kodi.al/tv/albdroid/"; // black.png  Albdroidtv.png  albdroid.png  albdroidflat.png
$data1 = date("l d/m/Y - H:i:s");
$data2 = date("l, d F Y - H:i:s");
$data3 = date("d F Y");
$viti = date("Y");
$time_zone = "Europe/Tirane";
$addon_host = "https://addons.kodi.al/";

// KODI STRUCTURE
$STRUKTURA_FILLIM = <<<KODI
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<channel> <!-- {$TITLE} -->
<name>[COLOR lime][B]{$TITLE}[/B][/COLOR]</name>
<thumbnail>{$THUMBNAIL}</thumbnail>
<fanart>{$THUMBNAIL}</fanart>
<items_info> <!-- THIS IS OPTIONAL -->
<title>[COLOR lime][B][I]Albdroid[/I][/B][/COLOR][COLOR lime] [B][I][COLOR red]([/COLOR]{$TITLE}[COLOR red])[/I][/B][/COLOR]</title>
<genre>[COLOR lime][B][I]Albdroid[/I][/B][/COLOR][COLOR lime] [B][I][COLOR red]([/COLOR]{$TITLE}[COLOR red])[/I][/B][/COLOR]</genre>
<description>[COLOR blue][B]Author:[/COLOR] [COLOR lime][B]Olsion Bakiaj[/B][/COLOR][COLOR red] &amp;[/COLOR][COLOR lime][B] Endrit Pano[/B][/COLOR]</description>
<thumbnail>{$THUMBNAIL}</thumbnail>
<fanart>{$THUMBNAIL}</fanart>
<date>[COLOR lime][B]{$data3}[/B][/COLOR]</date>
<credits>[COLOR lime]TRC4[/B][/COLOR]</credits>
<year>[COLOR lime][B]{$viti}[/B][/COLOR]</year>
</items_info>\n\n
KODI;
$STRUKTURA_FUND = <<<FUND
<SetViewMode>504</SetViewMode>
</channel>
FUND;
// KODI STRUCTURE
echo $STRUKTURA_FILLIM;
// CATEGORY STRUCTURE

header('Content-Type: text/xml; charset=utf-8');
echo "<item>\n";
echo "<title>[COLOR lime][B]".$TITLE."[/COLOR][/B]</title>\n";
echo "<link>".$LINK."</link>\n";
echo "<thumbnail>".$THUMBNAIL."</thumbnail>\n";
echo "<fanart>".$THUMBNAIL."</fanart>\n";
echo "<Build_Date>".$ADDED_DATE."</Build_Date>\n";
echo "<kategoria>".$TITLE."</kategoria>\n";
echo "<description>".$DESCRIPTION."</description>\n";
echo "<genre>[COLOR lime][B][I]Albdroid[/I][/B][/COLOR][COLOR lime] [B][I][COLOR red]([/COLOR]".$TITLE."[COLOR red])[/COLOR] [/I][/B][/COLOR]</genre>\n";
echo "<info>[COLOR lime][B]Website:[/B][/COLOR] [COLOR red][B]([/B][/COLOR][COLOR lime][B]Albdroid.AL[/B][/COLOR] [COLOR red][B]&amp;[/B][/COLOR] [COLOR lime][B]Kodi.AL[/B][/COLOR][COLOR red][B])[/B][/COLOR]</info>\n";
echo "<date>[COLOR lime][B]".$data2."[/B][/COLOR]</date>\n";
echo "</item>\n\n";

echo $STRUKTURA_FUND;
}
ob_end_flush();
?>