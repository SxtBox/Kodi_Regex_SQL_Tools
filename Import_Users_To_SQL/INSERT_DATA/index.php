<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert Kodi Data</title>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- 
<script
src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous">
</script>  -->

<script
src="assets/js/jquery_1.12.4.js">
</script>
</head>
<body>

<div id="login-overlay" class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myModalLabel">Insert Kodi Data</h4>
</div>
<div class="modal-body">
<div class="row">
<div class="col-xs-12">
<div class="well">
<form id="loginForm" method="" action="" novalidate="novalidate">
<div class="form-group">
<label for="username" class="control-label">Username</label>
<input type="text" class="form-control" id="username" name="username" value="" required="" title="Enter Username" placeholder="Enter Username">
<span class="help-block"></span>
</div>
<div class="form-group">
<label for="password" class="control-label">Password</label>
<input type="text" class="form-control" id="password" name="password" value="" required="" title="Enter Password" placeholder="Enter Password">
<span class="help-block"></span>
</div>
<div class="form-group">
<label for="email" class="control-label">Email</label>
<input type="text" class="form-control" id="email" name="email" value="" required="" title="Enter Email" placeholder="Enter Email">
<span class="help-block"></span>
</div>

<button type="button" class="btn btn-success btn-block" name="insert-data" id="insert-data" onclick="insertData()">Insert Data</button>
<br>
<p id="message"></p>
</form>
</div>
</div>

</div>
</div>
</div>
</div>
</body>

<script type="text/javascript">
function insertData() {
var username=$("#username").val();
var password=$("#password").val();
var email=$("#email").val();
// AJAX code to send data to php file.
$.ajax({
type: "POST",
url: "insert_data.php",
data: {username:username,password:password,email:email},
dataType: "JSON",
success: function(data) {
$("#message").html(data);
$("p").addClass("alert alert-success");
},
error: function(err) {
alert(err);
}
});
}
</script>
</html>