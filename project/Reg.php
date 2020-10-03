<!-- PHP file -->
<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
          $email = $_POST['inputEmail4'];
          $password = $_POST['inputPassword4'];
          $cpassword = $_POST['inputCPass'];
          $fname = $_POST['inputAddress'];
          $lname = $_POST['inputAddress2'];
          // $mobile = $_POST['inputphone'];
          // $address = $_POST['inputaddress'];
          // $country = $_POST['inputcountry'];
    // $exists=false; //for exit

    // Check whether this username exists
    $existSql = "SELECT * FROM `bbrusers` WHERE email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError = "User already Exists.";
    }
    else{
        // // $exists = false; 
        if(($password == $cpassword))
        {
            $hash = password_hash($password, PASSWORD_DEFAULT);
           
            $sql = "INSERT INTO `bbrusers` (`fname`, `lname`, `email`, `pass`,`dt`) VALUES ('$fname', '$lname', '$email', '$hash', CURRENT_TIMESTAMP)";

            $result = mysqli_query($conn, $sql);

            if ($result)
            {
                $showAlert = true;
            }
        }
        else{
            $showError = "Password do not match.";
        }
    }
}
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Registration</title>
  </head>
  <body>
    <!--Navebar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <a class="navbar-brand" href="https://bbr.org.in/" target="_blank">BBR</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link" href="welcome.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Login.php">Login</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dashboard
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="Dashboard.php">Profile</a>
              <a class="dropdown-item" href="Dashboard.php">Edit personal details</a>
              <a class="dropdown-item" href="Logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

<!-- PHP -->
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>'. $showError .'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

<!--Form-->
     <div class="container mt-5">
      <h1 class="text-center">Hey, Register to our Website!</h1>
            <form action="/project/Reg.php" method="POST">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" name="inputEmail4" class="form-control" id="inputEmail4" placeholder="abcd@abcd.com">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" name="inputPassword4" class="form-control" id="inputPassword4" placeholder="Enter a Password.">
          </div>
        </div>
        <div class="form-group ">
          <label for="inputCPass">Confirm Password</label>
          <input type="password" name="inputCPass" class="form-control" id="inputCPass" placeholder="Re-enter the Password.">
        </div>
        <div class="form-group">
          <label for="inputAddress">First Name</label>
          <input type="text" name="inputAddress" class="form-control" id="inputAddress" placeholder="Vinay">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Last Name</label>
          <input type="text" name="inputAddress2" class="form-control" id="inputAddress2" placeholder="Agrawal">
        </div>
        
        <button type="submit" class="btn btn-primary">Register</button>
      </form>
          <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="Login.php">Already have an account? Login</a>
          </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
