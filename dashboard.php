<?php
  session_start();

  if (!isset($_SESSION["user"])) {
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
  $id = $_SESSION["user"]["id"];
  
  $sql = "SELECT id, course, tutor_name FROM courses_for_user_$id";
  $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <nav> 
    <h1> Dashboard </h1>
    <form action="formAction.php" method="post">
      <input type="hidden" value=<?php echo $id ?>>
      <input type="submit" name="logout" class="btn-type-2" value="Logout">
    </form>
  </nav>
  <section class="content">
    <p class="welcome-msg"> Dear <?php echo $_SESSION["user"]["first_name"]; ?>, Welcome to your dashboard. You can add, edit, delete and see all courses </p>
    <form action="add_course.php" method="post" class="add-course">
      <input type="hidden" >
      <input type="submit" class="btn-type-2" value="Add Course">
    </form>
    <section class="course-list">
      <header> 
        <h3 class="all-courses"> All Courses </h3>
      </header>
      <div class="panes">
        <?php 
          if ($result->num_rows > 0) {
            $index = 0;
            while($row = $result->fetch_assoc()) {
            $index++
        ?>
              <div class="pane">
                <p class="col-1"><?php echo $index ?></p>
                <div class="col-2">
                  <p> <span> Title : </span> <?php echo $row["course"] ?> </p>
                  <p > <span> Tutor : </span> <?php echo $row["tutor_name"] ?> </p>
                </div>
                <form action="edit_course.php" method="post" class="col-3">
                  <input type="hidden" name="id" value=<?php echo $row["id"] ?>>
                  <input type="submit" name="edit_course" value="Edit" class="edit-course">
                  <input type="submit" name="delete_course" value="Delete" class="delete-course">
                </form>
              </div>
        <?php
            }
          } else {
            echo("<p> you have not added any course </p>");
          }
        ?>
      </div>
    </section>
  </section>
</body>
</html>