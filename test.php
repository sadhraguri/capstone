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
<div class="col-lg-7 col-lg-offset-5"><h1>Test Name:<?=$_SESSION['tname']?></h1><br/>
<h4 class="col-lg-7 ">Student Name: <?=$_SESSION['user_full_name']?></h4></div>
<div class="col-lg-12"><hr/></div>
<?php
$tid = mysqli_real_escape_string($conn, $_GET['t_id']);
$i=1;
$sx=mysqli_query($conn,"SELECT test_question.question,test_question.a,test_question.b,test_question.c,test_question.d,test_attempt.tapid FROM `test_attempt` inner JOIN test_question ON test_attempt.qid=test_question.tq_id WHERE test_attempt.test_id=$tid AND status='1' AND user_id=".$_SESSION['user_id'].";" );
while($ms=mysqli_fetch_array($sx)){
    ?><div class="col-lg-11 panel panel-body panel-default" style="margin-left: 30px;">
    <table><tr><td><b><?=$i?> Q:<?=$ms['question']?></b><br/>
            </td></tr>
        <tr><td><p><input type="radio" id="a" name="<?=$ms['tapid']?>" value="A"  onclick="set_ans(this,'<?=$ms['tapid']?>');">A:<?=$ms['a']?></p></td></tr>
        <tr><td><p><input type="radio" id="b" name="<?=$ms['tapid']?>" value="B" onclick="set_ans(this,'<?=$ms['tapid']?>');">B:<?=$ms['b']?></p></td></tr>
        <tr><td><p><input type="radio" id="c" name="<?=$ms['tapid']?>" value="C" onclick="set_ans(this,'<?=$ms['tapid']?>');">C:<?=$ms['c']?></p></td></tr>
        <tr><td><p><input type="radio" id="d" name="<?=$ms['tapid']?>" value="D" onclick="set_ans(this,'<?=$ms['tapid']?>');">D:<?=$ms['d']?></p></td></tr></table>
    </div>
<?php
    $i++;
}
printf( mysqli_error($conn));
?>

<div class="col-lg-12"><hr/></div>
<div class="col-lg-2 col-lg-offset-5">

    <button class="btn btn-block btn-success bg-success" onclick="location.href='result.php?tid=<?=$tid?>'">End Test</button>
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
function set_ans(v,id) {
    $.get('set_ans.php?id='+id+"&v="+v.value,function (data) {
//alert(data);
    });
}
</script>
