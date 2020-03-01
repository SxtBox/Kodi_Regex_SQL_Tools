<?php
// KODI TOOLS
// require "db_connection.php";

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "root";
    $db_name = "xml_with_sql";

    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if(!$con){
        die("Connection Failed : ".mysqli_connect_error());
    }

$xml = simplexml_load_file("kodi_users.xml"); // LOAD USER LISTS

$sql_delete = "DROP TABLE kodi_users";
$con->query($sql_delete);

$sql = "CREATE TABLE kodi_users(id int primary key auto_increment, username varchar(50), password varchar(15), email varchar(30))";

    if($con->query($sql) === TRUE) {
    echo "Table Was Created Successful<br><br>";
    } else {
    echo "There was an error creating the table: " . $con->error . "<br> <br>";
    }

    foreach($xml as $item)
	{
        echo "XML DATA <br>";
        echo "User Name: " . $item->username . "<br>";
        echo "Password: " . $item->password . "<br>";
        echo "Email: " . $item->email . "<br>";
        echo "<br>";

        $sql_insert = "INSERT INTO kodi_users VALUES('', '$item->username', '$item->password', '$item->email')";

        if($con->query($sql_insert) === TRUE) {
        echo "Users Imported Successful<br><br>";
        } else {
        echo "Error Importing into the Table: ". $con->error . "<br><br>";
        }
    }

    $con->close();
?>