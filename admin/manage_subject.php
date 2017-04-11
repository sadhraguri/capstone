<?php
include('../include/config.php');
if(isset($_POST['addclass'])){
  $subject=$_POST['subject'];
  $class=$_POST['class'];
  $sql=mysqli_query($conn,"INSERT INTO `subject`(`class_id`, `subject_name`) VALUES ($class,'$subject')");
  if(mysqli_insert_id($conn)!="")
  {
    header('location:manage_subject.php?done=1');
  }
}

if(isset($_POST['editclass']))
{
  $id=$_POST['subject_id'];
  $cname=$_POST['subject'];
  $eq=mysqli_query($conn,"UPDATE `subject` SET `subject_name`='$cname' WHERE `subject_id`='$id'");
  header('location:manage_subject.php');
}

if(isset($_GET['manage']) && $_GET['manage']=='delete')
{
  $id=$_GET['id'];
  $ex=mysqli_query($conn,"DELETE FROM `subject` WHERE `subject_id`='$id'");
  header('location:manage_subject.php');
}
include('assets/include/header.php');
?>
<div class="container">
  <div class="row">
    <div class="col-lg-12" style="margin-top:97px;">
      <h1>Manage Subject</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <?php
        if(isset($_GET['manage']) && $_GET['manage']=='edit')
        {
          ?>
          <form action="" method="post">
            <div class="col-lg-4">
              <div class="form-group">
                <input class="form-control" name="subject" value="<?=$_GET['subject_name']?>" type="text" />
                <input class="form-control" name="subject_id" value="<?=$_GET['id']?>" type="hidden" />
              </div>
            </div>
            <div class="col-lg-3">
                <button class="form-control btn btn-primary" name="editclass" type="submit">Edit Subject</button>
            </div>
          </form>
          <?php
        }else {
          # code...
          ?>
          <form action="" method="post">
            <div class="col-lg-4">
              <div class="form-group">
                <input class="form-control" name="subject" placeholder="subject name" type="text" />
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <select class="form-control" name="class">
                  <option value="">
                    Select Class
                  </option>
                    <?php
                        $sc=mysqli_query($conn,"SELECT * FROM classes");
                        while($cc=mysqli_fetch_assoc($sc))
                        {
                          ?>
                          <option value="<?=$cc['class_id']?>"><?=$cc['class_name']?></option>
                          <?php
                        }
                     ?>
                </select>
              </div>
            </div>
            <div class="col-lg-3">
                <button class="form-control btn btn-primary" name="addclass" type="submit">Add Subject</button>
            </div>
          </form>
          <?php
        }
       ?>

    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <table class="table">
        <thead>
          <tr>
            <th>
              subject id
            </th>
            <th>
              Class id
            </th>
            <th>
              subject Name
            </th>
            <th>

            </th>
          </tr>
        </thead>
        <tbody>
          <?php
              $sm=mysqli_query($conn,"SELECT * FROM subject");
              while($c=mysqli_fetch_assoc($sm))
              {
                ?>
                <tr>
                  <td>
                    <?=$c['subject_id']?>
                  </td>
                  <td>
                    <?=$c['class_id']?>
                  </td>
                  <td>
                      <?=$c['subject_name']?>
                  </td>
                  <td>
                    <a href="manage_subject.php?manage=edit&id=<?=$c['subject_id']?>&subject_name=<?=$c['subject_name']?>">Edit</a>
                    <a href="manage_subject.php?manage=delete&id=<?=$c['subject_id']?>">delete</a>
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
