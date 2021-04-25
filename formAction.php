<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_name = "zuri_task_4";


  // Create connection
  $conn = new mysqli($servername, $username, $password, $db_name);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
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
    // var_dump($_POST)
    if(isset($_POST["sign_up"])) {
      $email = $_POST["email"];
      $password = $_POST["password"];
      $date_of_birth = $_POST["date_of_birth"];
      $first_name = $_POST["first_name"];
      $surname = $_POST["surname"];

      // $user = [
      //     "email" => $email,
      //     "password" => $password, 
      //     "date_of_birth" => $date_of_birth,
      //     "first_name" => $first_name,
      //     "surname" => $surname
      // ];

      $sql = "INSERT INTO users (first_name, last_name, email, password)
      VALUES ('$first_name', '$surname', '$email', '$password');";
      
      if ($conn->multi_query($sql) === TRUE) {
        echo "<p> You have successfully registered, click <a href='login.php'> here </a> to login </p>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $sql = "SELECT id FROM users WHERE email='$email'";
      $result = $conn->query($sql);
      $id = $result->fetch_assoc()["id"];

      $sql = "CREATE TABLE courses_for_user_$id (
        id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        course VARCHAR(255),
        tutor_name VARCHAR(255)
        -- reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";

      $conn->query($sql);
      
      // if ($conn->query($sql) === TRUE) {
      //   echo "Table MyGuests created successfully";
      // } else {
      //   echo "Error creating table: " . $conn->error;
      // }

      $conn->close();

    } elseif (isset($_POST["login"])){
      
      $email = $_POST["email"];
      $password = $_POST["password"];

      $sql = "SELECT id, email, first_name, password FROM users";
      $result = $conn->query($sql);

      function user_exists($result,$email,$password) {
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            // var_dump($row);
            if($row["email"] === $email && $row["password"] === $password) {
              echo "logged in";
              $_SESSION["isLoggedIn"] = true;
              $_SESSION["user"] = ["id" => $row["id"], "first_name" => $row["first_name"]];
              header("Location: dashboard.php");
              die();
            } 
            // echo "email: " . $row["email"]. " ". "password: " . $row["password"]. " " . "<br>";
          }

          $_SESSION["login_err"] = "Invalid Email or Password";
        }
      }
      
      user_exists($result,$email,$password);

      $conn->close();

    } elseif (isset($_POST["reset_password"])){
      $email = $_POST["email"];
      $new_password = $_POST["new_password"];



      $sql = "UPDATE users SET password='$new_password' WHERE email='$email'";

      if ($conn->query($sql) === TRUE) {
        echo "<p> Record updated successfully, click <a href='login.php'> here </a> to login </p>";
      } else {
        echo "Error updating record: " . $conn->error;
      }

      $conn->close();
    } elseif (isset($_POST["add_course"])){
      $course_title = $_POST["course_title"];
      $tutor_name = $_POST["tutor_name"];

      $user_id = $_SESSION["user"]["id"];

      $sql = "INSERT INTO courses_for_user_$user_id (course, tutor_name)
      VALUES ('$course_title', '$tutor_name');";
      
      $conn->multi_query($sql);

      header("Location: dashboard.php");

      // if ($conn->multi_query($sql) === TRUE) {
      //   echo "<p> You have successfully registered, click <a href='login.php'> here </a> to login </p>";
      // } else {
      //   echo "Error: " . $sql . "<br>" . $conn->error;
      // }

      $conn->close();

    } elseif (isset($_POST["edit_course"])){
      $course_title = $_POST["course_title"];
      $tutor_name = $_POST["tutor_name"];

      $user_id = $_SESSION["user"]["id"];
      $course_id = $_POST["id"];

      $sql = "UPDATE courses_for_user_$user_id SET course='$course_title', tutor_name='$tutor_name' WHERE id='$course_id'";

      $conn->multi_query($sql);

      header("Location: dashboard.php");

      // if ($conn->multi_query($sql) === TRUE) {
      //   echo "<p> You have successfully registered, click <a href='login.php'> here </a> to login </p>";
      // } else {
      //   echo "Error: " . $sql . "<br>" . $conn->error;
      // }

      $conn->close();

    } elseif (isset($_POST["logout"])){
      
      session_unset();

      echo("<script> document.location.href = 'index.php' </script>");
    } else {
      echo("<script> document.location.href = 'index.php' </script>");
    }
  ?>
  
</body>
</html>