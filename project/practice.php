<!-- PHP -->
    <?php

    // Connecting to the Database
        $servername = "localhost";
        $username = "root";
        $password = "";

        // Create a connection
        $conn = mysqli_connect($servername, $username, $password);

        // Die if connection was not successful
        if (!$conn){
            die("Sorry we failed to connect: ". mysqli_connect_error() ."<br>");
        }
        else{
            echo "Connection was successful<br>";
        }


// Create a db
          $sql = "CREATE DATABASE dbVinay";
          $result = mysqli_query($conn, $sql);

          // Check for the database creation success
          if($result){
              echo "The db was created successfully!<br>";
          }
          else{
              echo "The db was not created successfully because of this error ---> ". mysqli_error($conn);
          }

//connection with form.

      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
          $email = $_POST['inputEmail4'];
          $password = $_POST['inputPassword4'];
          $fname = $_POST['inputAddress'];
          $lname = $_POST['inputAddress2'];
          //Show a alert to user.
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!<br></strong> Hii '. $fname.' '. $lname.' <br>Your email < '. $email.' > and password < '. $password.' > has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        // Submit these to a database
      }
      else 
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Holy guacamole!</strong> You should check in on some of those fields below.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';

    
    ?>
