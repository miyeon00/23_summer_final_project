<?php
require "db_connection.php";

session_start();


//setting cookies to remember user id, pw, user type
if (!empty($_REQUEST["remember"])) {
    setcookie("username", $_POST["username"], time() + 3600);
    setcookie("password", $_POST["password"], time() + 3600);
    setcookie("userttype", $_POST["userttype"], time() + 3600);
    echo "Cookies Set Successfuly";
} else {
    setcookie("username", "");
    setcookie("password", "");
    setcookie("userttype", "");
    echo "Cookies Not Set";
}

if (
    isset($_REQUEST["userttype"]) &&
    isset($_REQUEST["username"]) &&
    isset($_REQUEST["password"])
) {
    $usertype = $_REQUEST["userttype"];
    $username = $_REQUEST["username"];
    $pw = $_REQUEST["password"];

    $sql1 = "select * from members where user_id='$username' and memtype='$usertype'";

    $result = $mysqli->query($sql1);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $db_pw = $row["pw"];
            $verify = password_verify($pw, $db_pw);
            if ($verify) {
                //echo "Password Verified!";
				$_SESSION["username"] = $username;

                switch ($usertype) {
                    case "admin":
                        echo '<script type="text/javascript">
							window.location = "example_admin.html" // change url to your codd server // test Page
						 </script>';
                        break;
                    case "seller":
                        echo '<script type="text/javascript">
							window.location = "seller.php" // change url to your codd server
						 </script>';
                        break;
                    case "buyer":
                        echo '<script type="text/javascript">
							window.location = "example_buyer.html" // change url to your codd server
						 </script>';
                        break;
                }
            } else {
                echo "Incorrect Password!";
            }
        }
    } else {
        echo "0 results";
    }
}

$mysqli->close();
?>
