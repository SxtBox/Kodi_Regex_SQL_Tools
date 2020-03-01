<?php
// KODI TOOLS
$xml = simplexml_load_file("Send_To_Database_Playlilst.xml");  // PLAYLILST XML STRUCTURE

$conn = mysqli_connect("localhost", "root", "root");
mysqli_select_db($conn,"xml_with_sql");

foreach ($xml->item as $row)
{
    // SIMPLE XML STRUCTURE
    $title = $row->title;
    $link = $row->link;
    $thumbnail = $row->thumbnail;
    $fanart = $row->fanart;
    $category = $row->category;

    $sql = "INSERT INTO `kodi_simple_list` (`title`, `link`, `thumbnail`, `fanart`, `category`)
            VALUES('$title', '$link', '$thumbnail', '$fanart', '$category')";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        break;
    }
}
