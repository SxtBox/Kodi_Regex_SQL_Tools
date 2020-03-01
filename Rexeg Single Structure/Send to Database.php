<?php
// KODI TOOLS
$xml = simplexml_load_file("XML_Main_Structure.xml"); // REGEX XML STRUCTURE
$conn = mysqli_connect("localhost", "root", "root");
mysqli_select_db($conn,"xml_with_sql");

foreach ($xml->item as $row)
{
foreach ($xml->item->regex as $regex_row)
{
// SINGLE XML STRUCTURE
    $title = $row->title;
	$thumbnail = $row->thumbnail;
	$fanart = $row->fanart;
    $link = $row->link;
	$name = $row->regex->name;
	$expres = $row->regex->expres;
	$page = $row->regex->page;

    $sql = "INSERT INTO `regex_single` (`title`, `thumbnail`, `fanart`, `link`, `name`, `expres`, `page`)
            VALUES('$title', '$thumbnail', '$fanart', '$link', '$name', '$expres', '$page')";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        break;
    }
}
}