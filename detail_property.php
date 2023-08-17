<?php
  session_start();
  require "properties.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms</title>
  <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script src="js/main.js"></script>
</head>
<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Property Elements</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="seller.php">Home</a></li>
						<li class="breadcrumb-item">Apartments</li>
						<li class="breadcrumb-item active">Manage detail Rooms</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Property Elements</h5>
<?php
 if ($result->num_rows > 0){
  while ($row = $result->fetch_assoc())
  {
      $location = $row["location"];
      $price = $row["price"];
      $img = $row["img"];
      $age = $row["age"];
      $numberofBedrooms = $row["numberofBedrooms"];
      $numberofBathrooms = $row["numberofBathrooms"];
      $propertyTax = $row["propertyTax"];
      $description = $row["description"];
      
       $yesgarden;
       $nogarden;
       if($row["garden"] ==1){
           //true
           $yesgarden = "checked";
       }else{
           $nogarden= "checked";
       }

       $yesParking;
       $noParking;
       if($row["parking"] ==1){
           //true
           $yesParking = "checked";
       }else{
           $noParking= "checked";
       }
                  
  }
}
?>
       <form action="properties.php" method="post">
                <input type="hidden" id="mode" name="mode" value="<?php echo $_GET['mode'] ?>">
                <input type="hidden" id="id" name="pid" value="<?php echo $_GET['id'] ?>">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">location</label>
                  <div class="col-sm-10">
                    <input type="text" name="location" class="form-control" value="<?php echo $location ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">price</label>
                  <div class="col-sm-10">
                    <input type="number" name="price" class="form-control" value="<?php echo $price ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">IMG</label>
                  <div class="col-sm-5" id="in_file">
                    <input type="file" name="img" class="form-control" value="<?php echo $img ?>"/>
                </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">age</label>
                  <div class="col-sm-10">
                    <input type="number" name="age" class="form-control" value="<?php echo $age ?>" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Number of BedRooms</label>
                  <div class="col-sm-10">
                    <input type="number" name="numberofBedrooms" class="form-control" value="<?php echo $numberofBedrooms ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">number of Bathrooms</label>
                  <div class="col-sm-10">
                    <input type="number" name="numberofBathrooms" class="form-control" value="<?php echo $numberofBathrooms ?>" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Garden</label>
                  <div class="col-sm-10">
                      <div class="form-check">
                      <input class="form-check-input" type="radio" id="Garden1" name="garden" value="Y" <?php echo $yesgarden?>>
                      <label class="form-check-label" for="Garden">
                        yes
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="Garden2" name="garden" value="N" <?php echo $nogarden?>>
                      <label class="form-check-label" for="Garden">
                        no
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">parking</label>
                  <div class="col-sm-10">
                      <div class="form-check">
                      <input class="form-check-input" type="radio" id="parking1" name="parking" value="Y" <?php echo $yesParking?>>
                      <label class="form-check-label" for="Garden">
                        yes
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="parking2" name="parking" value="N" <?php echo $noParking?>>
                      <label class="form-check-label" for="Garden">
                        no
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputTime" class="col-sm-2 col-form-label">Tax</label>
                  <div class="col-sm-10">
                    <input type="number" name="propertyTax" class="form-control" value="<?php echo $propertyTax ?>">
                  </div>
                </div>
                <div class="row mb-3">
                      <label for="inputTime" class="col-sm-2 col-form-label">description</label>
                      <div class="col-sm-10">
                      <textarea class="form-control" placeholder="Leave a description here" id="floatingTextarea" style="height: 100px;" name="description"><?php echo $description ?></textarea>
                      </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form> 

      </div>
    </section>

  </main><!-- End #main -->

</body>

</html>