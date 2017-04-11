<?php
include('../include/config.php');
if(isset($_POST['addclass'])){
  $classname=$_POST['class'];
  $sql=mysqli_query($conn,"INSERT INTO `classes`(`class_name`) VALUES ('$classname')");
  if(mysqli_insert_id($conn)!="")
  {
    header('location:manage_class.php?done=1');
  }
}

if(isset($_POST['editclass']))
{
  $id=$_POST['class_id'];
  $cname=$_POST['class'];
  $eq=mysqli_query($conn,"UPDATE `classes` SET `class_name`='$cname' WHERE `class_id`='$id'");
  header('location:manage_class.php');
}

if(isset($_GET['manage']) && $_GET['manage']=='delete')
{
  $id=$_GET['id'];
  $ex=mysqli_query($conn,"DELETE FROM `classes` WHERE `class_id`='$id'");
  header('location:manage_class.php');
}
include('assets/include/header.php');
?>
<div class="container">
  <div class="row">
    <div class="col-lg-12" style="margin-top:97px;">
      <h1>Manage Class</h1>
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
                <input class="form-control" name="class" value="<?=$_GET['class_name']?>" type="text" />
                <input class="form-control" name="class_id" value="<?=$_GET['id']?>" type="hidden" />
              </div>
            </div>
            <div class="col-lg-3">
                <button class="form-control btn btn-primary" name="editclass" type="submit">Edit Class</button>
            </div>
          </form>
          <?php
        }else {
          # code...
          ?>
          <form action="" method="post">
            <div class="col-lg-4">
              <div class="form-group">
                <input class="form-control" name="class" placeholder="class name" type="text" />
              </div>
            </div>
            <div class="col-lg-3">
                <button class="form-control btn btn-primary" name="addclass" type="submit">Add Class</button>
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
              Class id
            </th>
            <th>
              Class Name
            </th>
            <th>

            </th>
          </tr>
        </thead>
        <tbody>
          <?php
              $sm=mysqli_query($conn,"SELECT * FROM classes");
              while($c=mysqli_fetch_assoc($sm))
              {
                ?>
                <tr>
                  <td>
                    <?=$c['class_id']?>
                  </td>
                  <td>
                    <?=$c['class_name']?>
                  </td>
                  <td>
                    <a href="manage_class.php?manage=edit&id=<?=$c['class_id']?>&class_name=<?=$c['class_name']?>">Edit</a>
                    <a href="manage_class.php?manage=delete&id=<?=$c['class_id']?>">delete</a>
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
