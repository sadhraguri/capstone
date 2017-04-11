<?php
include('include/config.php');
$f=1;
if(isset($_POST['login']))
{
  $uid=$_POST['uid'];
  $password=md5($_POST['password']);
  $ssx=mysqli_query($conn,"SELECT * FROM `user_table` WHERE `user_login_id`='$uid' AND `user_password`='$password' AND active=1");
  if(mysqli_num_rows($ssx)!="")
  {
    $log=mysqli_fetch_assoc($ssx);
    $uid=$log['user_id'];
    if($log['user_role']=='student')
    {
      $sx=mysqli_query($conn,"SELECT * FROM `student_tbl` WHERE `student_id`='$uid'");
      $ms=mysqli_fetch_assoc($sx);
      $data=array_merge($log,$ms);
      $_SESSION=array_merge($_SESSION,$data);
      header('location:home.php');
    }else {
      $sx=mysqli_query($conn,"SELECT * FROM `teacher_tbl` WHERE `teacher_id`='$uid'");
      $ms=mysqli_fetch_assoc($sx);
      $data=array_merge($log,$ms);
      $_SESSION=array_merge($_SESSION,$data);
      header('location:home.php');
    }
  }else{
      $f=0;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LMS LOGIN { learning Management System }</title>
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
  <div class="container">
      <div class="row">
          <h2 class="text-center">Learning Management System</h2>
          <?php
          if($f==0) {
              ?>
              <div class="col-lg-12 alert alert-danger"><h4>Incorrect Password/User ID OR Account is not Confirmed.</h4> </div>

              <?php
          }
          ?>
          <div class="col-md-4 col-md-offset-4">
              <div class="login-panel panel panel-default">

                  <div class="panel-heading">
                      <h3 class="panel-title">Please Sign In</h3>
                  </div>
                  <div class="panel-body">
                      <form role="form" action="" method="post">
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="User ID" name="uid" type="uid" autofocus>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Password" name="password" type="password" value="">
                              </div>
                              <button class="btn btn-primary  form-control" name="login" type="submit">Log In</button>
                          </fieldset>
                          <fieldset>
                              <div class="col-lg-12">
                                  <hr/>
                                  <h5>New User <a href="studentLogin.php">SignUp</a> </h5>
                              </div>
                          </fieldset>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
</body>
</html>
