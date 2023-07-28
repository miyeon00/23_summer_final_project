<?php
	require 'db_connection.php';
	
if (
    isset($_REQUEST['userttype']) &&
    isset($_REQUEST['username']) &&
    isset($_REQUEST['password'])
	){
		
	$usertype=$_REQUEST['userttype'];
	$username = $_REQUEST['username'];
	$pw = $_REQUEST['password'];
	
	$sql1 = "select * from members where user_id='$username' and memtype='$usertype'";
	echo $sql1;
	
	$result = $mysqli->query($sql1);

	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$db_pw = $row["pw"];
		$verify = password_verify($pw,$db_pw);
        if ($verify) {
			echo 'Password Verified!';
			echo '<script type="text/javascript">
				window.location = "https://codd.cs.gsu.edu/~mpark52/WP/PW/03/example_admin.html" // change url to your codd server
			</script>';
		} else {
			echo 'Incorrect Password!';
		}
		}
	} else {
		echo "0 results";
	}
	}

	$mysqli -> close();
?>