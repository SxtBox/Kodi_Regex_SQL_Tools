<?php
header('Content-type: text/xml');
//$kodi_xml_data = "<?xml version=\"1.0\" encoding=\"UTF-8\"?/>\n";
$kodi_xml_data = "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?>\n";
$kodi_xml_data .= "<channel>\n";

$db = new PDO("mysql:host=localhost;dbname=xml_with_sql", "root", "root");

$stmt = $db->prepare("SELECT * FROM regex_single");
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    // SINGLE XML STRUCTURE
    $kodi_xml_data .= "\t<item>\n";
    $kodi_xml_data .= "\t\t<title>".$row['title']."</title>\n";
    $kodi_xml_data .= "\t\t<thumbnail>".$row['thumbnail']."</thumbnail>\n";
    $kodi_xml_data .= "\t\t<fanart>".$row['fanart']."</fanart>\n";
    $kodi_xml_data .= "\t\t<link>".$row['link']."</link>\n";
    $kodi_xml_data .= "\t<regex>\n";
    $kodi_xml_data .= "\t\t<name>".$row['name']."</name>\n";
    $kodi_xml_data .= "\t\t<expres>".$row['expres']."</expres>\n";
    $kodi_xml_data .= "\t\t<page>".$row['page']."</page>\n";
    $kodi_xml_data .= "\t</regex>\n";
    $kodi_xml_data .= "\t</item>\n";
}

$kodi_xml_data .= "</channel>";

echo $kodi_xml_data;
file_put_contents("Retrieve_Regex_From_Database.xml", $kodi_xml_data);
