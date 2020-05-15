<?php

//link: https://www.w3schools.com/php/php_mysql_select.asp

//username and password is same as MySQL workbench root login info

//$dbname is scheduling 


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scheduling";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT cono FROM coursedetails";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "cono " . $row["cono"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>