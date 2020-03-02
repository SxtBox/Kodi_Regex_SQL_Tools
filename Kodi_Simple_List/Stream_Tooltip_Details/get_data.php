<?php
include('database_connection.php');
if(isset($_POST["id"]))
{
$query = "SELECT * FROM kodi_simple_list WHERE id = '".$_POST["id"]."'";
$statement = $con->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
$clean_titles = str_replace(
array("[COLOR lime][B]","[/COLOR][/B]","[COLOR lime]","[B]","[/COLOR]","[/B]"),
array("", "","","","",""),
$row["title"]
);

$output .= '
<img src="'.$row["thumbnail"].'" class="img-thumbnail" />
<h4>Title - '.$clean_titles.'</h4>
<h4>Category - '.$row["category"].'</h4>';
/*
  $output .= '
  <img src="'.$row["thumbnail"].'" class="img-thumbnail" />
  <h4>Title - '.$row["title"].'</h4>
  <h4>Category - '.$row["category"].'</h4>';
*/
}
echo $output;
}
?>