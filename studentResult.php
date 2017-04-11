<?php
include('include/config.php');
include('include/header.php');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Result</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <tr>
                    <th>
                        Test Name
                    </th>
                    <th>
                        Total question
                    </th>
                    <th>

                    </th>
                </tr>
                <?php
                $r=0;
                $sid=$_SESSION['user_id'];

                $sx=mysqli_query($conn,"SELECT * FROM test_tbl inner Join student_tbl  Where student_tbl.student_id=$sid AND test_tbl.test_id  IN (SELECT test_id from test_attempt WHERE user_id=".$_SESSION['user_id'].")") or($conn->error);
                while($t=mysqli_fetch_assoc($sx))
                {
                    $test=$t['test_id'];
                    //echo $test;
                    $r=1;
                    $_SESSION['tname']=$t['quiz_name'];
                    ?>
                    <tr>
                        <th>
                            <?=$t['quiz_name']?>
                        </th>
                        <th>
                            <?=$t['noq']?>
                        </th>
                        <th>
                            <a href="showResult.php?tid=<?=$test?>">Show Result</a>
                        </th>
                    </tr>
                    <?php
                }
                if($r==0) {
                    ?>
                    <tr><td colspan="3"><h3>No Test Available In Your Account.</h3></td></tr>


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
