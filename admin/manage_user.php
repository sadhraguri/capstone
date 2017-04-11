<?php
include('../include/config.php');


if(isset($_GET['manage']) && $_GET['manage']=='delete')
{
    $id=$_GET['id'];
    $ex=mysqli_query($conn,"DELETE FROM `user_table` WHERE `user_id`='$id'");

}
if(isset($_GET['manage']) && $_GET['manage']=='approve')
{
    $id=$_GET['id'];
    $ex=mysqli_query($conn,"UPDATE user_table SET active=1 WHERE `user_id`='$id'");

    $sdm=mysqli_query($conn,"SELECT * FROM user_table WHERE user_id=$id");
    $d=mysqli_fetch_array($sdm);
    $email=$d['user_email'];
    $loginid=$d['user_login_id'];
    echo $loginid;
    $name=$d['user_full_name'];

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

    $mail->Subject = 'Congratulation '.$name.' ,Your Regsisteration Successfully Completed in LMS.';
    $mail->Body    = '<html><h1>Welcome to Learning Management System.</h1><br/>
<br/><li>UserID:'.$loginid.'</li>
<br>
<hr/>
<a href="confirmMe.php?hex='.$password.'">Click Here</a> to Activate your LMS Account.
<br/>
<hr/>
<h1>Thanks & Regards</h1>
<p>LMS </p>
</html>';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
      //  header('location:manage_student.php');
    }
   // header('location:manage_subject.php');
}
include('assets/include/header.php');
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="margin-top:97px;">
                <h1>Manage Students</h1>
                <hr/>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Student Name
                        </th>

                        <th>
                            Student Class
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
                        Approve
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sm=mysqli_query($conn,"SELECT u.user_id,u.user_full_name,u.user_email,u.user_contact,u.user_login_id,(SELECT class_name from classes WHERE class_id=s.student_class) AS cls FROM user_table u INNER JOIN student_tbl s ON u.user_id=s.student_id WHERE u.active=0");
                    while($c=mysqli_fetch_assoc($sm))
                    {
                        ?>
                        <tr>
                            <td>
                                <?=$c['user_full_name']?>
                            </td>
                            <td>
                                <?=$c['cls']?>
                            </td>
                            <td>
                                <?=$c['user_email']?>
                            </td>
                            <td>
                                <?=$c['user_contact']?>
                            </td>
                            <td>
                                <?=$c['user_login_id']?>
                            </td>
                            <td>
                                <a href="?manage=approve&id=<?=$c['user_id']?>">Approve</a>
                                <a href="?manage=delete&id=<?=$c['user_id']?>">Delete</a>
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
