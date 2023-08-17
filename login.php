<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login</title>

  <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
  <script src="js/main.js"></script>

</head>

<body>

  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>
                  <form class="row g-3 needs-validation" action="check_login.php" method="post">
				          <div class="col-12">
                      <label for="yourUsername" class="form-label">Type</label>
                      <div class="input-group has-validation">
						            <select name="userttype" class="form-control" id="yourUsertype" >
                            <?php if (isset($_COOKIE["userttype"]))
                                  {
                                    $check_admin ="";
                                    $check_seller ="";
                                    $check_buyer ="";
                                    switch($_COOKIE["userttype"]){
                                      case "":
                                        $check_admin ="selected";
                                        break;
                                      case "":
                                        $check_seller ="selected";
                                        break;
                                      case "":
                                        $check_buyer ="selected";
                                        break;
                                      default:
                                      $check_seller ="selected";
                                       break;
                                    }
                                  }
                            
                            ?>
						              	<option value="admin" <?php echo $check_admin ?>>Admin</option>
							              <option value="seller" <?php  echo $check_seller ?>>Seller</option>
						              	<option value="buyer" <?php  echo $check_buyer ?>>Buyer</option>
					            	</select>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
              
                        <input type="text" name="username" class="form-control" id="yourUsername" value="<?php if (isset($_COOKIE["username"])) {
                            echo $_COOKIE["username"];
                        } ?>"  required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" value="<?php if (isset($_COOKIE["password"])) {
                          echo $_COOKIE["password"];
                      } ?>" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="register.html">Create an account</a></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main>
</body>

</html>