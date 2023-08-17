<?php
require "db_connection.php";

session_start();

$userid = $_SESSION["username"];

//fill the forms by using get['id'] -> primary key.;
$id = $_GET['id'];
if (isset($id))
{
    $sql3 = "select * from propertyDetails WHERE user_id='$userid' and id=$id";
    $result = $mysqli->query($sql3);
}
//delete
if (isset($_GET['mode']) && $_GET['mode'] == "delete")
{
    $sql = "DELETE FROM propertyDetails WHERE user_id='$userid' and id=$id";
    echo $sql;

    if ($mysqli->query($sql) === true)
    {
        echo "New record created successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    echo '<script type="text/javascript">
          window.location = "seller.php"
        </script>';
}

// insert or update property
if (isset($_REQUEST['location']) && isset($_REQUEST['price']) && isset($_REQUEST['img']) && isset($_REQUEST['age']) && isset($_REQUEST['numberofBedrooms']) && isset($_REQUEST['numberofBathrooms']) && isset($_REQUEST['garden']) && isset($_REQUEST['parking']) && isset($_REQUEST['description']) && isset($_REQUEST['propertyTax'])
)
{
    $location = $_REQUEST['location'];
    $age = $_REQUEST['age'];
    $price = $_REQUEST['price'];
    $img = $_REQUEST['img'];
    $description = $_REQUEST['description'];
    $numberofBedrooms = $_REQUEST['numberofBedrooms'];
    $numberofBathrooms = $_REQUEST['numberofBathrooms'];
    $garden = $_REQUEST['garden'];
    $propertyTax = $_REQUEST['propertyTax'];

    if ($garden == "Y")
    {
        $garden = 'true';
    }
    else
    {
        $garden = 'false';
    }
    $parking = $_REQUEST['parking'];
    if ($parking == "Y")
    {
        $parking = 'true';
    }
    else
    {
        $parking = 'false';
    }
    $sql;

    if ($_REQUEST['mode']=="edit")
    {
        // edit;
        $pid = isset($_REQUEST['pid']);
        $sql = "UPDATE propertyDetails SET location='$location',
                                        img='$img',
                                        price=$price,
                                        age=$age,
                                        numberofBedrooms=$numberofBedrooms,
                                        numberofBathrooms=$numberofBathrooms,
                                        garden=$garden,
                                        parking=$parking,
                                        propertyTax=$propertyTax,
                                        description='$description'
                                        WHERE user_id='$userid'
                                        and id=$pid";

    }
    else
    {
        // create new row;
        $sql = "INSERT INTO propertyDetails (location, img, price, age, numberofBedrooms, numberofBathrooms, garden,parking, propertyTax, description,user_id)
             VALUES ('$location', '$img', $price, $age, $numberofBedrooms, $numberofBathrooms, $garden, $parking, $propertyTax, '$description', '$userid')";
    }
    echo $sql;

    if ($mysqli->query($sql) === true)
    {
        echo "New record created successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    echo '<script type="text/javascript">
			window.location = "seller.php"
		  </script>';
          
}

$mysqli->close();

?>
