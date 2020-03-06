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
class Kodi_Structure_Builder {

function Kodi_Structure_Builder() {}

// KODI GENERATOR MAIN SQL STRUCTURE BUILDER
function Kodi_items_Builder($KODI_MAIN_DATA, $KODI_MAIN_STRUCTURE) {
$KODI_LAST_BUILD_DATE = '';
if (isset($KODI_MAIN_DATA[0]))
$KODI_LAST_BUILD_DATE = $KODI_MAIN_DATA[0]['DateTime'];
$GENERATE_ITEMS = '';
$KODI_GENERATE_ITEMS = '';
foreach ($KODI_MAIN_DATA as $ITEMID => $items) {
$KODI_LINK = $items['Link'];
$KODI_THUMBNAIL = $items['Thumbnail'];
$KODI_ID = $items['id'];
$KODI_TITLE = $items['Title'];
$KODI_PUB_DATE = $items['DateTime'];
$KODI_DESCRIPTION = $items['Desc'];

// DATA - VITI - ORA
$zone = "Europe/Tirane"; // Manual Zone
$data1 = date("l d/m/Y - H:i:s");
$data2 = date("l, d F Y - H:i:s");
$data3 = date("d F Y");
$viti = date("Y");
// DATA - VITI - ORA

// GENERATE MAIN ITEMS
$GENERATE_ITEMS .= "";
$GENERATE_ITEMS .= "<item>\n";
$GENERATE_ITEMS .= "<title>[COLOR lime][B]{$KODI_TITLE}[/B][/COLOR]</title>\n";
$GENERATE_ITEMS .= "<link>NULL</link>\n";
$GENERATE_ITEMS .= "<externallink>{$KODI_LINK}</externallink>\n";
$GENERATE_ITEMS .= "<ID>{$KODI_ID}</ID>\n";
$GENERATE_ITEMS .= "<description>{$KODI_DESCRIPTION}</description>\n";
//$GENERATE_ITEMS .= "<pubDate>{$KODI_PUB_DATE}</pubDate>\n"; // OPT 1
//$GENERATE_ITEMS .= "<lastBuildDate>{$KODI_LAST_BUILD_DATE}</lastBuildDate>\n";// OPT 2
$GENERATE_ITEMS .= "<referer>http://kodi.al/</referer>\n";
$GENERATE_ITEMS .= "<thumbnail>{$KODI_THUMBNAIL}</thumbnail>\n";
$GENERATE_ITEMS .= "<fanart>{$KODI_THUMBNAIL}</fanart>\n";
$GENERATE_ITEMS .= "<date>[COLOR lime][B]{$data2}[/B][/COLOR]</date>\n";
$GENERATE_ITEMS .= "<year>{$viti}</year>\n";
$GENERATE_ITEMS .= "<genre>[COLOR lime][B][I]Albdroid[/I][/B][/COLOR][COLOR lime][B][I] [COLOR red]([/COLOR]{$KODI_TITLE}[COLOR red])[/I][/B][/COLOR]</genre>\n";
$GENERATE_ITEMS .= "<info>[COLOR lime][B]Website:[/B][/COLOR] [COLOR red][B]([/B][/COLOR][COLOR lime][B]Albdroid.AL[/B][/COLOR] [COLOR red][B]&amp;[/B][/COLOR] [COLOR lime][B]Kodi.AL[/B][/COLOR][COLOR red][B])[/B][/COLOR]</info>\n";
$GENERATE_ITEMS .= "</item>\n\n"
;
}

echo $KODI_MAIN_STRUCTURE,$GENERATE_ITEMS;
echo "<SetViewMode>504</SetViewMode>\n\n";
echo "</channel>";
/*
return "
{$KODI_MAIN_STRUCTURE}{$GENERATE_ITEMS}
";
echo "<SetViewMode>504</SetViewMode>\n\n";
echo "</channel>";
*/
}
}
ob_end_flush();
?>