<?php

$servername = "localhost";
$username ="mpark52";
$password ="mpark52";
$dbname = "mpark52";
	
$mysqli = new mysqli($servername,$username,$password,$dbname);

// Check connection
if ($mysqli -> connect_error) {
  die ("Failed to connect to MySQL: " . $mysqli -> connect_error);
 
}else{
	echo "Connection established\n";
}

/*
// sql to create table for memberType
$sql1 = "CREATE TABLE IF NOT EXISTS memberType (
    id int PRIMARY KEY,
    memtype_id int,
    name varchar(50),
    created_at timestamp
)";

if ($mysqli->query($sql1) === TRUE) {
    echo "Table 'memberType' created successfully\n";
} else {
    echo "Error creating table 'memberType': " . $mysqli->error . "\n";
}

// sql to create table for members
$sql = "CREATE TABLE IF NOT EXISTS members (
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id varchar(50) UNIQUE,
    pw varchar(255),
    firstname varchar(50),
    email varchar(100),
    memtype_id int,
    created_at timestamp,
    FOREIGN KEY (memtype_id) REFERENCES memberType(id)
)";

if ($mysqli->query($sql) === TRUE) {
    echo "Table 'members' created successfully\n";
} else {
    echo "Error creating table 'members': " . $mysqli->error . "\n";
}
*/

?>