<?php
if(!isset($_SESSION['user_id']))
{
    header("Location:./");
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

    <title>LMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

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

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">LMS</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     <i class="fa fa-user fa-fw"></i>  Welcome <?=$_SESSION['user_full_name']?>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <?php
                      if(isset($_SESSION['user_role']) && $_SESSION['user_role']=='student')
                      {
                        ?>
                        <li><a href="home.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                        <li><a href="view_classmate.php"><i class="fa fa-home fa-fw"></i> My Class</a></li>
                        <li><a href="download_assignment.php"><i class="fa fa-download fa-fw"></i> Download Assignments</a></li>
                        <li><a href="doTest.php"><i class="fa fa-book fa-fw"></i> Give Test</a></li>
                        <li><a href="message.php"><i class="fa fa-envelope fa-fw"></i> Messages</a></li>
                        <li><a href="studentResult.php"><i class="fa fa-flag fa-fw"></i> Result</a></li>
                        <?php
                      }else {
                        ?>
                        <li><a href="home.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                        <li><a href="my_students.php"><i class="fa fa-users fa-fw"></i> My Student</a></li>
                        <li><a href="create_test.php"><i class="fa fa-book fa-fw"></i> Create Test</a></li>
                        <li><a href="upload_assignment.php"><i class="fa fa-upload fa-fw"></i> Upload material</a></li>
                        <li><a href="do_announcement.php"><i class="fa fa-bookmark fa-fw"></i> Announcement</a></li>
                        <li><a href="message.php"><i class="fa fa-envelope fa-fw"></i> Messages</a></li>
                        <?php
                      }
                       ?>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
