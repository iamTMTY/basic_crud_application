<?php
  session_start();

  // $servername = "localhost";
  // $username = "root";
  // $password = "";
  // $db_name = "zuri_task_4";


  // // Create connection
  // $conn = new mysqli($servername, $username, $password, $db_name);

  // // Check connection
  // if ($conn->connect_error) {
  //   die("Connection failed: " . $conn->connect_error);
  // }
  // echo "Connected successfully";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <?php
    if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
      header("Location: dashboard.php");
      die();
    } else {
  ?>
      <section class="index-form">
        <a href="login.php" class="btn-type-1 link-btn"> Login </a>
        <p> OR </p>
        <a href="sign_up.php" class="btn-type-1 link-btn"> Sign Up </a>
      </section>
  <?php
    }
  ?>

  
</body>
</html>