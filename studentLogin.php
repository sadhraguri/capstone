<?php
include('include/config.php');
$f=1;
$er="";
if(isset($_POST['addTeacher'])){
    // [fullname] => Shiabh
    // [email] => bshsh@Hams.com
    // [contact] => 8556093704
    // [password] => okok
    // [class] => 2
    // [subject] => 1
    // [addTeacher] =>


    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $password=md5($_POST['password']);
    $class=$_POST['class'];
    $loginid=$_POST['loginid'];
    $role="student";
    $k=mysqli_query($conn,"SELECT * FROM user_table WHERE user_email='$email' OR user_login_id='$loginid'");
    while($sk=mysqli_fetch_array($k))
     {
        $er = "Email ID Or Login ID already exists with us.";
         break;
    }
    if($er==""){
        $ex = mysqli_query($conn, "INSERT INTO `user_table`(`user_full_name`, `user_email`, `user_contact`, `user_login_id`, `user_password`, `user_role`,active)
  VALUES ('$fullname','$email','$contact','$loginid','$password','$role',0)");
        if (mysqli_insert_id($conn) != "") {
            $f=0;
            $id = mysqli_insert_id($conn);
            $as = mysqli_query($conn, "INSERT INTO `student_tbl`(`student_id`, `student_class`) VALUES ('$id','$class')");
            include "mail.php";
            $body= '<html><h1>Welcome to Learning Management System.</h1><br/>
<br/><li>UserID:'.$loginid.'</li><li>password:'.$_POST['password'].'</li>
<br>
<hr/>
<a href="confirmMe.php?hex='.$password.'">Click Here</a> to Activate your LMS Account.
<br/>
<hr/>
<h1>Thanks & Regards</h1>
<p>LMS </p>
</html>';
            mailme($email,'ravdeeps3@gmail.com','LMS','Congratulation '.$fullname.' ,Your Regsisteration Successfully Completed in LMS.','ravdeeps3@gmail.com','support LMS',$body);
            /*  require 'PHPMailer-master/PHPMailerAutoload.php';

              $mail = new PHPMailer();

              $mail->isSMTP();
              $mail->SMTPDebug = 0;a
              $mail->SMTPAuth = true;
              $mail->SMTPSecure = 'ssl';                               // Set mailer to use SMTP
              $mail->Host = 'smtp.gmail.com';//'smtp.zoho.com';
              // Specify main and backup SMTP servers
              $mail->Port=465;//'587';

              // Enable SMTP authentication
              $mail->Username = 'ravdeeps3@gmail.com';//'info@technicus.in';                 // SMTP username
              $mail->Password = 'chandeep12';//'shubham@123';
              // SMTP password
              // Enable encryption, 'ssl' also accepted

              $mail->From = 'info@lms.in';
              $mail->FromName = 'Learning Management System';
              // Add a recipient
              $mail->addAddress($email);               // Name is optional
              $mail->addReplyTo('sadhraguri@gmail.com', 'Learning Management System');


              $mail->WordWrap = 100;                                 // Set word wrap to 50 characters
      //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
              $mail->isHTML(true);                                  // Set email format to HTML

              $mail->Subject = 'Successfully Regsisteration in LMS.';
              $mail->Body    = '<html><h1>Welcome to Learning Management System.</h1><br/>
      <br/><li>UserID:'.$loginid.'</li><li>Password:'.$_POST['password'].'</li>
      <a href="confirmMe.php?hex='.$password.'">Click Here</a> to Activate your LMS Account.
      <h1>Thanks & Regards</h1>
      <p>LMS </p>
      </html>';

              if(!$mail->send()) {
                  echo 'Message could not be sent.';
                  echo 'Mailer Error: ' . $mail->ErrorInfo;
              } else {
                  header('location:manage_student.php');
              }
              header('location:manage_student.php');


      */
        }
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
        <h2 class="text-center">Student Sign Up</h2>
        <hr/>
        <?php
        if($f==0) {
            ?>
            <div class="col-lg-12 alert alert-success"><h4>Congoratulation!! Your Acount registeration request is submitted our Team contact you very soon.</h4> </div>

            <?php
        }
        if($er!="")
        {
            ?>
            <div class="col-lg-12 alert alert-warning"><h4><?=$er?></h4> </div>
        <?php
        }
        ?>
        <div class="col-md-4 col-md-offset-4">
            <div class="col-lg-12">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" placeholder="John" name="fullname" required="required" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="John@hg.com" name="email" required="required" />
                    </div>
                    <div class="form-group">
                        <label>Contact</label>
                        <input type="number" class="form-control" placeholder="8555936942" name="contact" required="required" />
                    </div>
                    <div class="form-group">
                        <label>Login ID</label>
                        <input type="text" class="form-control" placeholder="chaw" name="loginid" required="required" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="John" name="password" required="required" />
                    </div>
                    <div class="form-group">
                        <label>Class Assigned</label>
                        <select name="class" required="required" class="form-control">
                            <?php
                            $exc=mysqli_query($conn,"SELECT * FROM classes");
                            while($c=mysqli_fetch_assoc($exc))
                            {
                                ?>
                                <option value="<?=$c['class_id']?>"><?=$c['class_name']?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="from-group">
                        <button class="btn btn-primary form-control" name="addTeacher" type="submit">Sign up</button>
                    </div>
                </form>

            </div>
        </div>
        <br/>

        <div class="col-lg-3 panel panel-green">

                <div class="col-lg-12 panel-body">

                    <h5>You have already Account  <a href="./">SignIn</a> </h5>
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
