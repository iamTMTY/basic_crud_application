<?php
  session_start();

  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    var_dump($_SESSION["user"]);
    header("Location: index.php");
    die();
  }

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

  $user_id = $_SESSION["user"]["id"];
  $course_id = $_POST["id"];

  if(isset($_POST["edit_course"])) {

    $sql = "SELECT course, tutor_name FROM courses_for_user_$user_id WHERE id=$course_id";
    $result = $conn->query($sql);
    
    $course_details = $result->fetch_assoc();

  } elseif(isset($_POST["delete_course"])) {

    $sql = "DELETE FROM courses_for_user_$user_id WHERE id=$course_id";

    if ($conn->query($sql) === TRUE) {
      $conn->close();
      header("Location: dashboard.php");
    } else {
      echo "Error deleting record: " . $conn->error;
      $conn->close();
      die();
    }
  }
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
<div class="content">
    <a href="dashboard.php" class="btn-type-2 link-btn"> Go Back </a>

    <h1> Edit Course </h1>

    <form action="formAction.php" method="post">
      <input type="hidden" name="id" value="<?php echo $course_id ?>">
      <label for="course_title"> Course Title</label><br>
      <input type="text" name="course_title" id="" value="<?php echo $course_details["course"] ?>" ><br>
      <label for="tutor_name"> Tutor Name </label><br>
      <input type="text" name="tutor_name" id="" value="<?php echo $course_details["tutor_name"] ?>" ><br>
      <input type="submit" class="btn-type-2" value="edit course" name="edit_course">
    </form>
  </div>
</body>
</html>