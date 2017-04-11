<?php
include('include/config.php');
if(isset($_POST['add']))
{
  $class=$_SESSION['teacher_class'];
  $title=$_POST['title'];
  $det=$_POST['details'];
  $uplby=$_SESSION['user_id'];
  $s="INSERT INTO `announcement`(`class_id`, `title`, `description`, `uploaded_by`)
  VALUES ('$class','$title','$det','$uplby')";
  $ex=mysqli_query($conn,$s);
}
include('include/header.php');
 ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Make Announcement</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-lg-4">
                <form action="" method="post">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" />
                  </div>
                  <div class="form-group">
                    <lable>Details</lable>
                    <textarea name="details" class="form-control"></textarea>
                  </div>
                  <input type="submit" class="form-control btn btn-primary" value="Add" name="add" />
                </form>
              </div>
              <div class="col-lg-8">
                <table class="table">
                  <tr>
                    <th>
                      Title
                    </th>
                    <th>
                      Body
                    </th>
                  </tr>
                  <?php
                    $uid=$_SESSION['user_id'];
                    $xx=mysqli_query($conn,"SELECT *  FROM announcement WHERE uploaded_by='$uid'");
                    while ($an=mysqli_fetch_assoc($xx)) {
                      # code...
                      ?>
                      <tr>
                        <td>
                          <?=$an['title']?>
                        </td>
                        <td>
                          <?=$an['description']?>
                        </td>
                      </tr>
                      <?php
                    }
                   ?>
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
