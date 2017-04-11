<?php
include('../include/config.php');
if(isset($_POST['addCalender'])){
  $dta=$_POST['date'];
  $des=$_POST['des'];
  $sql="INSERT INTO `calender_school`(`date`, `description`) VALUES ('$dta','$des')";
  // echo $sql;
  $ins=mysqli_query($conn,$sql);
  header('location:manage_calender.php?done=1');
}
include('assets/include/header.php');

?>
<div class="container">
  <div class="row">
    <div class="col-lg-12" style="margin-top:60px;">
      <h1>Manage Calendar</h1>
    </div>
  </div>
  <div class="row">
    <?php

     ?>
    <div class="col-lg-4">
      <form action="" method="post">
        <div class="form-group">
          <label>Date</label>
          <input type="date" class="form-control" placeholder="John" name="date" required="required" />
        </div>

        <div class="form-group">
          <label>Description</label>
          <textarea class="form-control" name="des">
          </textarea>
        </div>
        <div class="from-group">
          <button class="btn btn-primary form-control" name="addCalender" type="submit">Add Calender</button>
        </div>
      </form>
    </div>
    <div class="col-lg-8">
      <table class="table">
        <thead>
          <tr>
            <th>
              Date
            </th>
            <th>
              Details
            </th>

            <th>

            </th>
          </tr>
        </thead>
        <tbody>
          <?php
              $sx=mysqli_query($conn,"SELECT * FROM calender_school");
              while($data=mysqli_fetch_assoc($sx))
              {
              ?>
              <tr>
                <td>
                  <?=$data['date']?>
                </td>
                <td>
                  <?=$data['description']?>
                </td>
                <td>
                  <a href="manage_calender.php?id=<?=$data['user_id']?>&manage=delete">Delete</a>
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
