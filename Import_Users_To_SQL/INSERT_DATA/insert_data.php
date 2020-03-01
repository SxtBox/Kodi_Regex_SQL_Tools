<?php
include('db_connection.php');
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];

$stmt = $con->prepare("INSERT INTO kodi_users(username,password,email) VALUES(:username, :password,:email)");

$stmt->bindparam(':username', $username);
$stmt->bindparam(':password', $password);
$stmt->bindparam(':email', $email);
if($stmt->execute())
{
$res="<center>Data Inserted Successfully:";
echo json_encode($res);
}
else
{
$error="<center>Data Not Inserted";
echo json_encode($error);
}
?>
