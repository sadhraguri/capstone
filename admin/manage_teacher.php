<?php
include('../include/config.php');
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
  $subject=$_POST['subject'];
  $loginid=$_POST['loginid'];
  $role="teacher";

  $ex=mysqli_query($conn,"INSERT INTO `user_table`(`user_full_name`, `user_email`, `user_contact`, `user_login_id`, `user_password`, `user_role`)
  VALUES ('$fullname','$email','$contact','$loginid','$password','$role')");
  if(mysqli_insert_id($conn)!="")
  {
    $id=mysqli_insert_id($conn);
    $as=mysqli_query($conn,"INSERT INTO `teacher_tbl`(`teacher_id`, `teacher_class`, `subject_id`) VALUES ('$id','$class','$subject')");
    header('location:manage_teacher.php');
  }
  require '../PHPMailer-master/PHPMailerAutoload.php';

  $mail = new PHPMailer();

  $mail->isSMTP();
  $mail->SMTPDebug = 0;
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
    header('location:manage_teacher.php');
  }
  header('location:manage_teacher.php');




}
if(isset($_GET['manage']) && $_GET['manage']=='delete')
{
  $id=$_GET['id'];
  $del=mysqli_query($conn,"DELETE  FROM user_table WHERE user_id='$id'");  
}
include('assets/include/header.php');
?>
<div class="container">
  <div class="row">
    <div class="col-lg-12" style="margin-top:60px;">
      <h1>Manage Teacher</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
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
        <div class="form-group">
          <label>Subject Assigned</label>
          <select name="subject" required="required" class="form-control">
          <?php
              $exc=mysqli_query($conn,"SELECT * FROM subject");
              while($c=mysqli_fetch_assoc($exc))
              {
                ?>
                <option value="<?=$c['subject_id']?>"><?=$c['subject_name']?></option>
                <?php
              }
           ?>
         </select>
        </div>
        <div class="from-group">
          <button class="btn btn-primary form-control" name="addTeacher" type="submit">Add Teacher</button>
        </div>
      </form>
    </div>
    <div class="col-lg-8">
      <table class="table">
        <thead>
          <tr>
            <th>
              Teacher ID
            </th>
            <th>
              Name
            </th>
            <th>
              Email
            </th>
            <th>
              Contact
            </th>
            <th>
              Login ID
            </th>
            <th>

            </th>
          </tr>
        </thead>
        <tbody>
          <?php
              $sx=mysqli_query($conn,"SELECT * FROM user_table INNER JOIN teacher_tbl WHERE user_table.user_id=teacher_tbl.teacher_id");
              while($data=mysqli_fetch_assoc($sx))
              {
              ?>
              <tr>
                <td>
                  <?=$data['user_id']?>
                </td>
                <td>
                  <?=$data['user_full_name']?>
                </td>
                <td>
                  <?=$data['user_email']?>
                </td>
                <td>
                  <?=$data['user_contact']?>
                </td>
                <td>
                  <?=$data['user_login_id']?>
                </td>
                <td>
                  <a href="manage_teacher.php?id=<?=$data['user_id']?>&manage=delete">Delete</a>
                </td>
              </tr>
              <?php
              }
           ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
include('assets/include/footer.php');
