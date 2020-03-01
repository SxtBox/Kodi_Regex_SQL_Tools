<?php
header('Content-type: text/xml');

$kodi_xml_data = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$kodi_xml_data .= "<channel>\n";

$db = new PDO("mysql:host=localhost;dbname=xml_with_sql", "root", "root");

$stmt = $db->prepare("SELECT * FROM kodi_simple_list");
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
		// SIMPLE XML STRUCTURE
    $kodi_xml_data .= "\t<item>\n";
    $kodi_xml_data .= "\t\t<title>".$row['title']."</title>\n";
    $kodi_xml_data .= "\t\t<link>".$row['link']."</link>\n";
    $kodi_xml_data .= "\t\t<thumbnail>".$row['thumbnail']."</thumbnail>\n";
    $kodi_xml_data .= "\t\t<fanart>".$row['fanart']."</fanart>\n";
    $kodi_xml_data .= "\t\t<category>".$row['category']."</category>\n";
    $kodi_xml_data .= "\t</item>\n";
}

$kodi_xml_data .= "</channel>";

echo $kodi_xml_data;
file_put_contents("Get_From_Database.xml", $kodi_xml_data);