<?php
include('include/config.php');
if(isset($_POST['body']))
{
  $uid=$_SESSION['user_id'];
  $to=$_POST['message_for'];
  $subject=$_POST['subject'];
  $body=$_POST['body'];
  $sxc=mysqli_query($conn,"INSERT INTO `message`(`from_user`, `to_user`, `subject`, `body`) VALUES ('$uid','$to','$subject','$body')");
  header('location:message.php');
}
include('include/header.php');
 ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Message</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php if($_SESSION['user_role']=='teacher'){

               ?>
               <div class="col-lg-4">
                  <form action="" method="post">
                    <div class="form-group">
                      <label>Message for</label>
                      <select name="message_for" class="form-control">
                          <option value="">
                            Select
                          </option>
                          <?php
                            $w=mysqli_query($conn,"SELECT * FROM user_table");
                            while($us=mysqli_fetch_assoc($w))
                            {
                              ?>
                              <option value="<?=$us['user_id']?>">
                                <?=$us['user_full_name']?>
                              </option>
                              <?php
                            }
                           ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <lable>Subject</lable>
                      <input type="text" class="form-control" name="subject" required="required" />
                    </div>
                    <div class="form-group">
                      <lable>Body</lable>
                    <textarea class="form-control" name="body" required="required"></textarea>
                    </div>
                    <button class="btn btn-primary form-control" type="submit">Send Message</button>
                  </form>
                </div><?php }?>
                <div class="col-lg-8 panel panel-green">

                  <table class="table table-bordered">
                    <thead>
                    <tr><td colspan="3"><h4><b>Inbox</b></h4></td></tr>
                      <tr>
                        <th>
                          From
                        </th>
                        <th>
                          Title
                        </th>
                        <th>
                          Message
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $user_id=$_SESSION['user_id'];
                        $sc=mysqli_query($conn,"SELECT (SELECT user_full_name FROM user_table WHERE user_table.user_id=message.from_user) AS frm,message.subject,message.body FROM message WHERE to_user='$user_id' ORDER BY message.message_id DESC ");
                        while($ms=mysqli_fetch_assoc($sc))
                        {
                          ?>
                          <tr>
                            <td>
                              <?=$ms['frm']?>
                            </td>
                            <td>
                                <?=$ms['subject']?>
                            </td>
                            <td>
                                <?=$ms['body']?>
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
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php
include('include/footer.php');
?>
