<?php
include('include/config.php');
include('include/header.php');
 ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Download Assignment</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <td>
                          Subject
                        </td>
                        <td>
                          Download
                        </td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $class=$_SESSION['student_class'];
                          $sx=mysqli_query($conn,"SELECT * FROM `assignment_tbl` INNER JOIN subject ON subject.subject_id=assignment_tbl.subject_id WHERE assignment_tbl.class_id='$class'");
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
