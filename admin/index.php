<?php
include('../include/config.php');
if(isset($_POST['dosignin']))
{
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $password=md5($password);

    //select userdetails

    $sql="SELECT * FROM user_table WHERE user_login_id='$username' AND user_password='$password' AND user_role  ='admin' ";
    // echo $sql;
    $x=mysqli_query($conn,$sql);
    if(mysqli_num_rows($x)!="")
    {
        //fetch details
        $ans=mysqli_fetch_assoc($x);
        if($ans['user_role']=='admin')
        {
            $_SESSION=array_merge($_SESSION,$ans);
            header('location:dashBoard.php');
        }else
        {
            echo "<script>alert('Unauthorised Access')</script>";
        }
    }else
    {
        echo "<script>alert('Username Password is Wrong')</script>";
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage LMS</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<div class="container">
    <div class="container" style="margin-top:10px;">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="well well-sm">Manange Your site...
                <form class="form-signin" action="" method="post" name="dosignin" id="signinfrm" style="display:block;">
                    <h2 class="form-signin-heading"><i class="icon-key"></i>Sign in</h2><br>

                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block" style="background:#4c376c;" name="dosignin"
                            type="submit">Sign in
                    </button>
                </form>
            </div>
        </div>
    </div><script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>


</body>
</html>
