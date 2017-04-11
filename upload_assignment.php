<?php
include('include/config.php');
include('include/header.php');
 ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Upload Assignment</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-lg-4">
                <form action="saveAssignment.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Class</label>
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
                    <label>Subject</label>
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
                  <div class="form-group">
                    <label>Upload Assignment</label>
                    <input type="file" name="docs" required="required" />
                  </div>
                  <button class="btn btn-primary form-control" name="addAssignment">Add Assignment</button>
                </form>
              </div>
              <div class="col-lg-8">
                <table class="table">
                  <thead>
                    <tr>
                      <th>
                        Subject Id
                      </th>
                      <th>
                        Download
                      </th>
                      <th>

                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $uid=$_SESSION['user_id'];
                        $sx=mysqli_query($conn,"SELECT * FROM `assignment_tbl` INNER JOIN subject ON subject.subject_id=assignment_tbl.subject_id WHERE uploaded_by='$uid'");
                        while($ass=mysqli_fetch_assoc($sx))
                        {
                          ?>
                          <tr>
                            <th>
                            <?=$ass['subject_name']?>
                            </th>
                            <th>
                              <a href="uploads/<?=$ass['docs']?>">Download</a>
                            </th>
                            <th>

                            </th>
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
