<?php include("include/config.php");
?>
<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>LSM Test</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <style>

    </style>
</head>
<body>
<div class="col-lg-7 col-lg-offset-5"><h1>Test Name:<?= $_SESSION['tname'] ?></h1></div>
<div class="col-lg-12">
    <hr/>
</div>
<?php
$i=0;
$t=0;
if (isset($_GET['tid'])) {
    $tid = mysqli_real_escape_string($conn, $_GET['tid']);
    $sx = mysqli_query($conn, "SELECT test_question.question,test_question.a,test_question.correct_ans,test_question.b,test_question.c,test_question.d,test_attempt.tapid,test_attempt.answer FROM `test_attempt` inner JOIN test_question ON test_attempt.qid=test_question.tq_id WHERE test_attempt.test_id=$tid AND status='0' AND user_id=" . $_SESSION['user_id'] . ";");
    while ($ms = mysqli_fetch_array($sx)) {
        $ans1="";
        if ($ms['answer'] == '0') {
            $ans1 = "Not Attempted";
        }
        else{
            $ans1 = $ms['answer'];
        }

        ?>
        <div class="col-lg-11 panel panel-body panel-default" style="margin-left: 30px;">
            <table>
                <tr>
                    <td><b>Q:<?= $ms['question'] ?></b><br/>
                    </td>
                </tr>
                <tr>
                    <td><p>A:<?= $ms['a'] ?></p></td>
                </tr>
                <tr>
                    <td><p>B:<?= $ms['b'] ?></p></td>
                </tr>
                <tr>
                    <td><p>C:<?= $ms['c'] ?></p></td>
                </tr>
                <tr>
                    <td><p>D:<?= $ms['d'] ?></p></td>
                </tr>
                <tr>
                    <td><p>Correct Answer:<?= $ms['correct_ans'] ?></p></td>
                </tr>
                <tr>
                    <td><p>Selected Answer:<?= $ans1 ?></p></td>
                </tr>
            </table>
        </div>
        <?php
       // mysqli_query($conn, "UPDATE test_attempt SET status='0' WHERE tapid=" . $ms['tapid']);
        if ($ms['answer'] == $ms['correct_ans']) {
            $i++;
            $t++;
        } else {
            $t++;
        }
    }

    printf(mysqli_error($conn));
}
?>
<div class="panel panel-default panel-body col-lg-4 col-lg-offset-4" style="text-align: center;">
    <h1>Result: <?=$i?>/<?=$t?></h1>
</div>
<div class="col-lg-12">
    <hr/>
</div>
<div class="col-lg-2 col-lg-offset-5">

    <button class="btn btn-block btn-success bg-success" onclick="location.href='home.php'">Home</button>
    <br/>
</div>
</body>
<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu"gin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="vendor/raphael/raphael.min.js"></script>
<script src="vendor/morrisjs/morris.min.js"></script>
<script src="data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

</html>
<script>
    function set_ans(v, id) {
        $.get('set_ans.php?id=' + id + "&v=" + v.value, function (data) {
//alert(data);
        });
    }
</script>
