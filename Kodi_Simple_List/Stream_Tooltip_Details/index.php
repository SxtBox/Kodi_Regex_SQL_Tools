<?php
include('database_connection.php');
$query = "SELECT * FROM kodi_simple_list ORDER BY title ASC";
$statement = $con->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
?>
<html>  
<head>  
<title>Stream Tooltip Details</title>  
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>  
<body>  
<div class="container">
<br/>

<h3 align="center">Stream Tooltip Details</a></h3><br />
<br />
<div class="row">
<div class="col-md-3">

</div>
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Stream Details</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered">
<tr>
<th>Stream Title</th>
</tr>
<?php
foreach($result as $row)
{
$clean_titles = str_replace(
array("[COLOR lime][B]","[/COLOR][/B]","[COLOR lime]","[B]","[/COLOR]","[/B]"),
array("", "","","","",""),
$row["title"]
);
echo '<tr><td><b><a href="#" id="'.$row["id"].'" title=" ">'.$clean_titles.'</a></b></td></tr>';
//echo '<tr><td><b><a href="#" id="'.$row["id"].'" title=" ">'.$row["title"].'</a></b></td></tr>';
}
?>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</body>  
</html>  

<script>  
$(document).ready(function(){ 

$('a').tooltip({
classes:{
"ui-tooltip":"highlight"
},
position:{ my:'left center', at:'right+50 center'},
content:function(result){
$.post('get_data.php', {
id:$(this).attr('id')
}, function(data){
result(data);
});
}
});
  
});  
</script>