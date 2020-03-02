<?php
//sleep(1); // DONT USE SLEEP
$output = '';

if(isset($_FILES['file']['name']) &&  $_FILES['file']['name'] != '')
{
$valid_extension = array('xml');
$file_data = explode('.', $_FILES['file']['name']);
$file_extension = end($file_data);
if(in_array($file_extension, $valid_extension))
 {
$data = simplexml_load_file($_FILES['file']['tmp_name']);

include("db_connection.php");
// OR WITHOUT include
// $con = new PDO("mysql:host=localhost;dbname=xml_with_sql", "root", "root");

$query = "INSERT INTO kodi_simple_list (title, link, thumbnail, fanart, category) VALUES(:title, :link, :thumbnail, :fanart, :category);";

$statement = $con->prepare($query);

for($i = 0; $i < count($data); $i++)
{
$statement->execute(
array(
 ':title'     => $data->item[$i]->title,
 ':link'      => $data->item[$i]->link,
 ':thumbnail' => $data->item[$i]->thumbnail,
 ':fanart'    => $data->item[$i]->fanart,
 ':category'  => $data->item[$i]->category
)
);

}
$result = $statement->fetchAll();
if(isset($result))
{
$output = '<div class="alert alert-success">Importing XML Data Done</div>';
}
}
else
{
$output = '<div class="alert alert-warning">Invalid XML File</div>';
}
}
else
{
$output = '<div class="alert alert-warning">Select XML File</div>';
}
echo $output;
?>