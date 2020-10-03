<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: Login.php");
    exit;
}

  include 'dbconnect.php';
  $sql = "SELECT * FROM `bbrusers`";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result))
  {
    # code...
    $fname = $row['fname'];
    $lname = $row['lname'];
    $mail = $row['email'];
    $numb = $row['mobile'];
    $add = $row['address'];
    $cotry = $row['country'];
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- <link rel="stylesheet" type="text/css" href="Dashboard.css"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Dashboard</title>
  </head>
  <body>
    <!--Navebar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="https://bbr.org.in/">BBR</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="welcome.php">HOME :)) <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Reg.php">Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Login.php">Login</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dashboard
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="#">Edit personal details</a>
          <a class="dropdown-item" href="Logout.php">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

   <!--Profile-->
<div class="container mt-5">

    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="pp.jpg" width="90"><span class="font-weight-bold"><?php echo $fname .' '. $lname ?></span><span style="color: green"><?php echo $mail ?></span><span><?php echo $cotry ?></span></div>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <h6><a href="welcome.php">Back to home</a></h6>
                    </div>
                    <h6 class="text-right">Edit Profile</h6>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                      <label for="inputAddress">First Name</label>
                      <input type="text" name="inputAddress" class="form-control" id="inputAddress" placeholder="first name" value="<?php echo $fname ?>">
                    </div>
                    <div class="col-md-6">
                      <label for="inputAddress2">Last Name</label>
                      <input type="text" name="inputAddress2" class="form-control" id="inputAddress2" value="<?php echo $lname ?>" placeholder="last name">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                      <label for="inputEmail4">Email</label>
                      <input type="text" name="inputEmail4" class="form-control" id="inputEmail4" placeholder="Email" value="<?php echo $mail ?>">
                    </div>
                    <div class="col-md-6">
                      <label for="inputphone">Mobile Number</label>
                      <input type="text" name="inputphone" class="form-control" id="inputphone" value="<?php echo $numb ?>" placeholder="Phone number">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                      <label for="inputaddress">Address</label>
                      <input type="text" name="inputaddress" class="form-control" id="inputaddress" placeholder="address" value="<?php echo $add ?>">
                    </div>
                    <div class="col-md-6">
                      <label for="inputcountry">Country</label>
                      <input type="text" name="inputcountry" class="form-control" id="inputcountry" value="<?php echo $cotry ?>" placeholder="Country">
                    </div>
                </div>
               
                <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
    </div>

</div>

  }
?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!-- additional link- 1-icon; 2-jquery -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <!-- Templet link:- https://bbbootstrap.com/snippets/bootstrap-edit-profile-form-84177583 -->
  </body>
</html>
