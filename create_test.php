<?php
include('include/config.php');
if (isset($_POST['save'])) {
    $uid = $_SESSION['user_id'];
    $subject = $_POST['subject'];
    $nm = $_POST['testName'];
    $noq = $_POST['noq'];
    $cid = $_POST['c_id'];
    $xc = mysqli_query($conn, "INSERT INTO `test_tbl`(`subject_id`, `quiz_name`, `uploaded_by`,noq,class_id)
  VALUES ('$subject','$nm','$uid',$noq,$cid)");
    $test = mysqli_insert_id($conn);
    header('location:addQuestion.php?testid=' . $test);
}
if (isset($_POST['saveEx'])) {
    $uid = $_SESSION['user_id'];
    $subject = $_POST['subject'];
    $nm = $_POST['testName'];
    $noq = $_POST['noq'];
   // $cid = $_POST['c_id'];
    $cid='';
    $xc = mysqli_query($conn, "INSERT INTO `test_tbl`(`subject_id`, `quiz_name`, `uploaded_by`,noq,class_id)
  VALUES ('$subject','$nm','$uid',$noq,$cid)");
    $test = mysqli_insert_id($conn);
    header('location:excelUpload.php?testid=' . $test);
}
include('include/header.php');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Test</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-4">
            <form action="" method="post">
                <div class="form-group">
                    <label>Subject</label>
                    <select name="subject" required="required" class="form-control">
                        <?php
                        $exc = mysqli_query($conn, "SELECT * FROM subject");
                        while ($c = mysqli_fetch_assoc($exc)) {
                            ?>
                            <option value="<?= $c['subject_id'] ?>"><?= $c['subject_name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Test Name</label>
                    <input type="text" class="form-control" required name="testName"/>
                </div>
              <!--  <div class="form-group">
                    <label>Class</label>
                    <select class="form-control" name="c_id" required>
                        <?php
                        $s = mysqli_query($conn, "SELECT * FROM classes");
                        while ($r = mysqli_fetch_array($s)) {
                            ?>
                            <option value="<?= $r['class_id'] ?>"><?= $r['class_name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>-->
                <div class="form-group">
                    <label>No of Question</label>
                    <select class="form-control" name="noq" required>
                        <?php
                        for ($i = 10; $i < 100; $i += 5) {
                            ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="save" class="btn btn-primary form-control">Create Test & Add Question
                </button>
                <hr/>
                <button type="submit" name="saveEx" class="btn btn-primary form-control">Create Test & Add Question From
                    Excel
                </button>
            </form>
        </div>
        <div class="col-lg-6">
            <table class="table">
                <tr>
                    <th>
                        Test Name
                    </th>
                    <th>
                        Total question
                    </th>
                    <th>
                        Add Question
                    </th>
                </tr>
                <?php
                $uid = $_SESSION['user_id'];
                $sx = mysqli_query($conn, "SELECT * FROM test_tbl WHERE uploaded_by='$uid'");
                while ($t = mysqli_fetch_assoc($sx)) {
                    $test = $t['test_id'];
                    $sc = mysqli_query($conn, "SELECT COUNT(*) as `to` FROM `test_question` WHERE test_id='$test'");
                    $data = mysqli_fetch_assoc($sc);
                    ?>
                    <tr>
                        <th>
                            <?= $t['quiz_name'] ?>
                        </th>
                        <th>
                            <?= $data['to'] ?>
                        </th>
                        <th>
                            <a href="addQuestion.php?testid=<?= $test ?>">Add Qus</a>
                        </th>
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
