<?php
include('include/config.php');
include('include/header.php');
 ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Your Class Mate</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php
                    $class=$_SESSION['student_class'];
                    $sx=mysqli_query($conn,"SELECT * FROM user_table INNER JOIN student_tbl WHERE user_table.user_id=student_tbl.student_id AND student_class='$class'");
                    while($ans=mysqli_fetch_assoc($sx))
                    {
                      ?>
                      <div class="col-lg-3 well">
                        <?=$ans['user_full_name']?>
                        <br />
                        Contact : <?=$ans['user_contact']?>
                        <br />
                        Email : <?=$ans['user_email']?>
                      </div>
                      <?php
                    }
                 ?>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php
include('include/footer.php');
?>
