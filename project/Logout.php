<?php
session_start();

session_unset();
session_destroy();

echo "You are Logout!<br> <b><a href='Login.php'>Login</a></b> again.";

//header("location: login.php");

exit;
?>