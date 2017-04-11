<?php
include('include/config.php');
include('include/header.php');
if(isset($_GET['testid']))
{
    $_SESSION['t_id']=$_GET['testid'];
}
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
<div class="col-lg-12">
    <form name="import" method="post" enctype="multipart/form-data">
        <input type="file" name="file" /><br />
        <input type="submit" name="submit" value="Submit" />
    </form>
</div>

        <div class="col-lg-12 table-responsive">
            <table class="table table-bordered ">
                <tbody>
                <tr><th>S No.</th><th>Question</th><th>A</th><th>B</th><th>C</th><th>D</th><th>Answere</th></tr>
            <?php
if(isset($_POST['submit']))
{
    $file = $_FILES['file']['tmp_name'];
$handle = fopen($file, "r");
$c = 0;
    $tid=$_SESSION['t_id'];
while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
{
    if($c!=0) {
        $q = $filesop[0];
        $a = $filesop[1];
        $b = $filesop[2];
        $cc = $filesop[3];
        $d = $filesop[4];
        $ans = $filesop[5];
        ?>
        <tr>
            <td><?= $c ?></td>
            <td><?= $q ?></td>
            <td><?= $a ?></td>
            <td><?= $b ?></td>
            <td><?= $cc ?></td>
            <td><?= $d ?></td>
            <td><?= $ans?></td>
        </tr>
        <?php
        mysqli_query($conn,"INSERT INTO `test_question`(`test_id`, `question`, `a`, `b`, `c`, `d`, `correct_ans`) VALUES ($tid,'$q','$a','$b','$cc','$d','$ans')");

    }
//echo $name;
    //$sql = mysql_query(“INSERT INTO mytask (name, project) VALUES (‘$name’,’$project’)”);
$c = $c + 1;
}




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
