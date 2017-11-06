<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <title>Sign Up Page</title>
    <?php
    $connection = mysql_connect("localhost", "root", "abc"); // Establishing Connection with Server
    $db = mysql_select_db("student_list", $connection); // Selecting Database from Server
    if(isset($_POST['studentSignUpbtn'])){
      if(isset($_POST['userpassword']) && isset($_POST['userconfirmpassword'])){
        $password = $_POST['userpassword'];
        $confirmpassword = $_POST['userconfirmpassword'];
        if($password != $confirmpassword){
          echo "<script type='text/javascript'>alert('password is not correct..!')</script>";
        }
        else{
          $userid = $_POST['userid'];
          $username = $_POST['username'];
          $email = $_POST['emailid'];
          $phonenumber = $_POST['userphoneno'];
          $branch = $_POST['branch'];
          $stream = $_POST['stream'];
          $section = $_POST['section'];
          $password = $_POST['userpassword'];
          if($name !=''||$email !=''){
            $query = mysql_query("insert into student_list_01(userId, userName, emailId, phoneNumber, branch, stream, section, password) values ('$userid', '$username', '$email', '$phonenumber', '$branch', '$stream', '$section', '$password')");
            echo "<script type='text/javascript'>alert('submitted successfully !')</script>";
            echo "<script type='text/javascript'>alert('you are ready to be logged in now.. !')</script>";
            header("Location:studentLogInPage.php");
          }
          else{
            echo "<script type='text/javascript'>alert('failed!')</script>";
          }
          }
        }
      }

    mysql_close($connection); // Closing Connection with Server
    ?>
  </head>
  <body>
    <h1>Student Sign Up Page</h1><hr>
    <form class="form-horizantal" role="form" action="#" method="post">
      <div class="form-group">
        <label for="userId" class="col-sm-2 control-label">User Id:</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="userid" name="userid" placeholder="Enter enrollment number" required>
        </div>
      </div>
      <div class="form-group">
        <label for="userName" class="col-sm-2 control-label">User Name:</label>
        <div class="col-sm-10">
          <input type="name" class="form-control" id="username" name="username" placeholder="Enter User Name" required>
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email Id:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Enter Email Id" required>
        </div>
      </div>
      <div class="form-group">
        <label for="userPhoneNo" class="col-sm-2 control-label">Phone Number:</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="userphoneno" name="userphoneno" placeholder="Enter Phone Number" required>
        </div>
      </div>
      <div class="form-group">
        <label for="branch" class="col-sm-2 control-label">Branch:</label>
        <div class="col-sm-10">
          <select name="branch">
          <option value="B.tech">B.TECH</option>
          <option value="M.tech">M.TECH</option>
          <option value="BCA">BCA</option>
          <option value="MCA">MCA</option>
          <option value="BBA">BBA</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="stream" class="col-sm-2 control-label">Stream:</label>
        <div class="col-sm-10">
          <select name="stream">
          <option value="CSE">CSE</option>
          <option value="ECE">ECE</option>
          <option value="EE">EE</option>
          <option value="EE/E">EE/E</option>
          <option value="Civil">CIVIL</option>
          <option value="Mechanical">MECHANICAL</option>
          <option value="Bio-tech">BIO_TECH</option>
          </select>
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
          <input type="password" class="form-control" id="userpassword" name="userpassword" placeholder="Enter password" required>
        </div>
      </div>
      <div class="form-group">
        <label for="passwordConfirm" class="col-sm-2 control-label">Confirm Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="userconfirmpassword" name="userconfirmpassword" placeholder="Enter password" required>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-2">
          <input type="submit" class="btn btn-info btn-lg btn-lg" name="studentSignUpbtn" value="Sign Up>>">
        </div>
      </div>
    </form>
    <a class="btn btn-link" href="studentdbms.php">Back To Home</a>
  </body>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" ></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" ></script>
</html>
