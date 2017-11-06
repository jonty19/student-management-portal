<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <title>Home Page</title>
    <?php
    if(isset($_POST["stdUpdatebtn"])){
    $user = $_SESSION['sess_user'];
    $sec = $_SESSION['section'];
    if( $user != "" && $sec!="" ) {
        $sem1 = $_POST['sem1'];
        $sem2 = $_POST['sem2'];
        $sem3 = $_POST['sem3'];
        $sem4 = $_POST['sem4'];
        $sem5 = $_POST['sem5'];
        $sem6 = $_POST['sem6'];
        $sem7 = $_POST['sem7'];
        $sem8 = $_POST['sem8'];
        $connection = mysql_connect("localhost", "root", "abc"); // Establishing Connection with Server
        $db = mysql_select_db("student_list", $connection);
        if ($sec == "CSE-3A") {
          $query = mysql_query("insert into sec3a(enroll, 1st, 2nd, 3rd, 4th, 5th, 6th, 7th, 8th) values ('$user', '$sem1', '$sem2', '$sem3', '$sem4', '$sem5', '$sem6', '$sem7', '$sem8')");
          echo "<script type='text/javascript'>alert('submitted successfully !')</script>";
          echo "<script type='text/javascript'>alert('Your semester marks are successfully updated on database !')</script>";
        } elseif ($sec == "CSE-3B") {
          $query = mysql_query("insert into sec3b(enroll, 1st, 2nd, 3rd, 4th, 5th, 6th, 7th, 8th) values ('$user', '$sem1', '$sem2', '$sem3', '$sem4', '$sem5', '$sem6', '$sem7', '$sem8')");
          echo "<script type='text/javascript'>alert('submitted successfully !')</script>";
          echo "<script type='text/javascript'>alert('Your semester marks are successfully updated on database !')</script>";
        } elseif ($sec == "CSE-3C") {
          $query = mysql_query("insert into sec3c(enroll, 1st, 2nd, 3rd, 4th, 5th, 6th, 7th, 8th) values ('$user', '$sem1', '$sem2', '$sem3', '$sem4', '$sem5', '$sem6', '$sem7', '$sem8')");
          echo "<script type='text/javascript'>alert('submitted successfully !')</script>";
          echo "<script type='text/javascript'>alert('Y our semester marks are successfully updated on database !')</script>";
        }
        mysql_close($connection);
      }
    }

     ?>
  </head>
  <body>
    <h1 class="text-info text-center">Student Credentials</h1><hr><hr>
    <h3 class="text-info text-center"> UserId : <?php echo $_SESSION['sess_user']; ?></h3>
    <h3 class="text-info text-center"> Section :<?php echo $_SESSION['section']; ?> </h3>
    <form class="form-horizontal" role="form" action="" method="post">
      <div class="form-group">
        <h3 class="text-success text-center">~:Fill Up Academics Details:~</h3><hr class="text-success">
        <label for="userSection" class="col-sm-2 control-label">First Semester GPA:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="sem1" name="sem1" placeholder="Enter 1st sem gpa">
        </div>
      </div>
      <div class="form-group">
        <label for="userSection" class="col-sm-2 control-label">Second Semester GPA:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="sem2" name="sem2" placeholder="Enter 2nd sem gpa">
        </div>
      </div>
      <div class="form-group">
        <label for="userSection" class="col-sm-2 control-label">Third Semester GPA:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="sem3" name="sem3" placeholder="Enter 3rd sem gpa">
        </div>
      </div>
      <div class="form-group">
        <label for="userSection" class="col-sm-2 control-label">Fourth Semester GPA:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="sem4" name="sem4" placeholder="Enter 4th sem gpa">
        </div>
      </div>
      <div class="form-group">
        <label for="userSection" class="col-sm-2 control-label">Fifth Semester GPA:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="sem5" name="sem5" placeholder="Enter 5th sem gpa">
        </div>
      </div>
      <div class="form-group">
        <label for="userSection" class="col-sm-2 control-label">Sixth Semester GPA:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="sem6" name="sem6" placeholder="Enter 6th sem gpa">
        </div>
      </div>
      <div class="form-group">
        <label for="userSection" class="col-sm-2 control-label">Seventh Semester GPA:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="sem7" name="sem7" placeholder="Enter 7th sem gpa">
        </div>
      </div>
      <div class="form-group">
        <label for="userSection" class="col-sm-2 control-label">Eighth Semester GPA:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="sem8" name="sem8" placeholder="Enter 8th sem gpa">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-2">
          <input type="submit" class="btn btn-success btn-lg" name="stdUpdatebtn" value="Update>>">
        </div>
      </div>
    </form>
    <a class="btn btn-success btn-lg" href="LogInStd.php">Log Out</a>
  </body>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" ></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" ></script>
</html>
