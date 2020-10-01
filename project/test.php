<!-- Registration form link from db -->

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $desc = $_POST['desc'];
        
      
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "contacts";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        $sql = "INSERT INTO `contactus` (`name`, `email`, `concern`, `dt`) VALUES ('$name', '$email', '$desc', current_timestamp())";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }

      }

    }

    // Usage of WHERE Clause to Update Data
$sql = "UPDATE `phptrip` SET `name` = 'FromBihar' WHERE `dest` = 'Bihar'";
$result = mysqli_query($conn, $sql);
echo var_dump($result);
$aff = mysqli_affected_rows($conn);
echo "<br>Number of affected rows: $aff <br>";
if($result){
    echo "We updated the record successfully";
}
else{
    echo "We could not update the record successfully";
}
?>

INSERT INTO `bbrusers` (`Sr.No.`, `fname`, `lname`, `email`, `pass`, `mobile`, `address`, `country`, `dt`) VALUES (NULL, 'vinay', 'agrawal', 'agrawalvinay@gmail.com', '12345678', '1234567890', 'fgsdfg', 'ind', CURRENT_TIMESTAMP);

<!-- Cookeis -->
<!-- Set the cookies -->
<?php
  $cookie_name = "user_email";
  if (isset($REQUEST["Remember"])) {
    $cookie_value = $_REQUEST["email"];
    $cookie_expire = time()+60*60*24*2;
    setCookie($cookie_name, $cookie_value, $cookie_expire);
  }
?> <!-- Put it on above HTML -->

<!-- Read the cookies -->
<?php
  if (isset($_COOKIE[$cookie_name])) {
    # code...
    echo "Cookie Name is" . $cookie_name . "and Value is" . $_COOKIE[$cookie_name] .
    "<br>";
  }
  else {
    echo "Cookie not set";
  }
?>