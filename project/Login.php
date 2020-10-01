<!-- PHP file -->
<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $email = $_POST["inputEmail4"];
    $password = $_POST["inputPassword4"]; 
    
     
    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "Select * from bbrusers where email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['pass'])){ 
                $login = true;

                  
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                header("location: welcome.php");
            } 
            else{
                $showError = "Invalid Credentials";
            }
        }
        
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>

<?php
  $cookie_name = "user_email";
  if (isset($REQUEST["gridCheck"])) {
    $cookie_value = $_REQUEST["email"];
    $cookie_expire = time()+60*60*24*2;
    setCookie($cookie_name, $cookie_value, $cookie_expire);
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

    <title>Login</title>
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
      <li class="nav-item ">
        <a class="nav-link" href="Reg.php">Registration</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Login</a>
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

<?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }

    $cookie_name = "inputEmail4";
    if (isset($_COOKIE[$cookie_name])) {
    # code...
    echo "Cookie Name is" . $cookie_name . "and Value is" . $_COOKIE[$cookie_name] .
    "<br>";
    }
    else {
      echo "Cookie not set";
    }
?>

   <!--Form-->
   <div class="container mt-5">
    <h1 class="text-center">Login here!</h1>
<form action="/project/Login.php" method="POST">
  
    <div class="form-group">
      <label for="inputEmail4">Email</label>
      <input type="email" name="inputEmail4" class="form-control" id="inputEmail4" placeholder="abcd@abcd.com">
    </div>
    <div class="form-group">
      <label for="inputPassword4">Password</label>
      <input type="password" name="inputPassword4" class="form-control" id="inputPassword4" placeholder="Enter a Password.">
    </div>
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" name="Remember" type="checkbox" id="gridCheck">
        <label class="form-check-label" for="gridCheck">
          Remember me
        </label>
      </div>
    </div>
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>
    <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="Reg.php">New around here? Register here</a>
        <a class="dropdown-item" href="Fgpass.php">Forgot password?</a>
      </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>