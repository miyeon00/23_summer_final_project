<?php
session_start();
require "list_seller.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Components / Cards - HouseForStudents Bootstrap Template</title>
    <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/main.js"></script>
  </head>
  <body>
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="">
          <span class="d-none d-lg-block">HouseForStudents</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
        
      </div>
      
      <div class="header-nav ms-auto">
          <button type="button" class="btn btn-success float-right" onclick="window.location.href='logout.php';"><i class="bi bi-check-circle"></i>LogOut</button>
      </div>
    </header>
    <!-- End Header -->
    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Manage Rooms</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="seller.php">Home</a>
            </li>
            <li class="breadcrumb-item">Apartments</li>
            <li class="breadcrumb-item active">Manage Rooms</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->
      <section class="section">
        <div class="row align-items-top">
          
<?php
if ($result->num_rows > 0)
{
    // output data of each row
    while ($row = $result->fetch_assoc())
    {
?> 			<div class='col-lg-4'>
			  <div class="card">
              <?php
                  $imgUrl = $row['img'];
                  if(strlen($imgUrl) ==0 || is_null($imgUrl) || empty($imgUrl)){
                      $imgUrl = 'house.jpg';
                  }
                  else{
                    $imgUrl = 'house.jpg';
                  }
              ?>
              <img src="<?php echo 'img/' . $imgUrl?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">
                  <b> <?php echo $row["price"] ?> </b>
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">
                  <b> <?php echo $row["numberofBedrooms"] ?> Beds - <?php echo $row["numberofBathrooms"] ?> Bathroom </b>
                </h6>
                <h7 class="location-information mb-2 text-muted">
                  <b> <?php echo $row["location"] ?> </b>
                </h7>
                <p class="card-text"> <?php echo $row["description"] ?> </p>
                <p class="card-text">
                  <a href="detail_property.php?mode=edit&id=<?php echo $row['id']?>" class="btn btn-primary">Edit Details</a>
                </p>
                <a href="example_buyer.html" class="card-link">Buyer Page</a>
                <a href="properties.php?mode=delete&id=<?php echo $row['id']?>" class="card-link">Delete This Property</a>
              </div>
            </div>
	</div>
<?php
    }
}
?>
<div class='col-lg-4'>
            <!-- case : there is nothing in properties table -->
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Add Properties</h5>
                <div class="d-grid gap-2 mt-3">
                  <button class="btn btn-primary" type="button" onclick="window.location.href='detail_property.php';">Add</button>
                </div>
              </div>
            </div>
          </div>
</div>
          <!-- End Special title treatmen -->
        </div>
        <!-- End Special title treatmen -->
      </section>
    </main>
    <!-- End #main -->
  </body>
</html>
