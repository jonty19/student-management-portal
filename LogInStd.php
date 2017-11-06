<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <title>Log In Page</title>
  </head>
  <body>
    <form class="form-horizantal" role="form" action="#" method="post">
      <h1>Student Management System Log In Page</h1><hr>
      <div class="form-group">
        <label for="userId" class="col-sm-2 control-label">User Id:</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="userid" name="userid" placeholder="Enter enrollment number" required>
        </div>
      </div>
      <div class="form-group">
        <label for="userSection" class="col-sm-2 control-label">Section:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="usersection" name="section" placeholder="Enter Section" required>
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password" required>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-2">
          <input type="submit" class="btn btn-info btn-lg btn-lg" name="studentLogInbtn" value="Log In>>">
        </div>
      </div>
    </form>
    <?php
if(isset($_POST["studentLogInbtn"])){

if(!empty($_POST['userid']) && !empty($_POST['password'])) {
    $user=$_POST['userid'];
    $pass=$_POST['password'];
    $section = $_POST['section'];
    $con=mysql_connect('localhost','root','abc') or die(mysql_error());
    mysql_select_db('student_list') or die("cannot select DB");

    $query=mysql_query("SELECT * FROM student_list_01 WHERE userId='".$user."' AND password='".$pass."'");
    $numrows=mysql_num_rows($query);
    if($numrows!=0)
    {
    while($row=mysql_fetch_assoc($query))
    {
    $dbusername=$row['userId'];
    $dbpassword=$row['password'];
    }

    if($user == $dbusername && $pass == $dbpassword)
    {
    session_start();
    $_SESSION['sess_user']=$user;
    $_SESSION['section']= $section;
    /* Redirect browser */
    header("Location: StudentHome.php");
    }
    } else {
    echo "Invalid username or password!";
    }

} else {
    echo "All fields are required!";
}
}
?>
  </body>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" ></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" ></script>
</html>
