<?php

require 'db_connection.php';

 // SQL to create table for propertyDetails
$sql = "CREATE TABLE IF NOT EXISTS propertyDetails (
    id int AUTO_INCREMENT PRIMARY KEY,
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

// Code to retrieve form data and insert into 'propertyDetails' table
if (
    isset($_REQUEST['userttype']) &&
    isset($_REQUEST['userid']) &&
    isset($_REQUEST['password']) &&
    isset($_REQUEST['fname']) &&
    isset($_REQUEST['lname']) &&
    isset($_REQUEST['email'])
) {
    // Taking all values from the form data (i = input)
    $i_userType = $_REQUEST['userttype'];
    $i_userid = $_REQUEST['userid'];
    $i_password = $_REQUEST['password'];
    $i_fname = $_REQUEST['fname'];
    $i_lname = $_REQUEST['lname']; // Fix: use $i_lname for last name
    $i_email = $_REQUEST['email'];

    
        // Insert data into 'members' table
        $insert_sql = "INSERT INTO members (memtype, user_id, pw, firstname, lastname, email) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_insert = $mysqli->prepare($insert_sql);
		$hashed_password = password_hash($i_password, PASSWORD_DEFAULT); // Generate hashed password
        $stmt_insert->bind_param("ssssss", $i_userType, $i_userid, $hashed_password, $i_fname, $i_lname, $i_email);

        if ($stmt_insert->execute()) {
            //echo "Data inserted successfully\n";
			echo '<script type="text/javascript">
				window.location = "https://codd.cs.gsu.edu/~mpark52/WP/PW/03/login.html" // change url to your codd server
			</script>';
        } else {
            echo "Error inserting data: " . $stmt_insert->error . "\n";
        }

        $stmt_insert->close();
    
}

$mysqli -> close();

?>