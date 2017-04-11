<?php
include('include/config.php');
include('include/header.php');

 ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome <?=$_SESSION['user_full_name']?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php
                  if(isset($_SESSION) && $_SESSION['user_role']=='student')
                  {
                    ?>
                    <div class="col-lg-6">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          Announcement
                        </div>
                        <div class="panel-body">
                          <?php
                            $class=$_SESSION['student_class'];
                              $data=mysqli_query($conn,"SELECT * FROM `announcement` WHERE class_id='$class' ORDER BY aid DESC ");
                              while($an=mysqli_fetch_assoc($data))
                              {
                                ?>
                                <div class="col-lg-12  well-lg well" >
                                 <div class="col-lg-12"><b> <?=$an['title']?></b><span class="pull-right"><small><?=$an['uploaded_date']?></small></span></div>
                                  <hr/>
                                  <?=$an['description']?>
                                </div>
                                <?php
                              }

                           ?>
                        </div>
                      </div>
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
