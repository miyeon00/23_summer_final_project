<?php
require "db_connection.php";

session_start();

// SQL to create table for propertyDetails
$sql = "CREATE TABLE IF NOT EXISTS propertyDetails (
    id int AUTO_INCREMENT PRIMARY KEY,
    img varchar(500),
	  price int,
    description varchar(1000),
    location varchar(50),
    age int,
    numberofBedrooms int,
    numberofBathrooms int,
    garden BOOLEAN,
    parking BOOLEAN,
	  propertyTax int,
	  user_id varchar(50),
	  FOREIGN KEY (user_id) REFERENCES members(user_id) 
)";

if ($mysqli->query($sql) === TRUE) {
    echo "Table 'propertyDetails' created successfully\n";
} else {
    echo "Error creating table 'propertyDetails': " . $mysqli->error . "\n";
}

//Get USerId from session $_SESSION["username"];
$username = $_SESSION["username"];

$sql1 = "SELECT * FROM propertyDetails where user_id = '$username' ";

$result = $mysqli->query($sql1);
/*
if ($result->num_rows > 0) {
  // output data of each row
  //echo "1";
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    echo $row["price"];
  }
} else {
  echo "0 results";
}

*/


$mysqli->close();
?>