<?php
  session_start();

  if (!isset($_SESSION["user"])) {
    var_dump($_SESSION["user"]);
    header("Location: index.php");
    die();
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
    <a href="dashboard.php" class="btn-type-2" > Go Back </a><br/><br/><br/>

    <h1 > Add a new Course </h1><br>

    <form action="formAction.php" method="post">
      <label for="course_title"> Course Title : </label><br>
      <input type="text" name="course_title" id=""><br>
      <label for="tutor_name"> Tutor Name : </label><br>
      <input type="text" name="tutor_name" id=""><br>
      <input type="submit" class="btn-type-2" value="add course" name="add_course">
    </form>
  </div>
</body>
</html>