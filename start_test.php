<?php
include "include/config.php";
$j=0;
$tid = mysqli_real_escape_string($conn, $_GET['testid']);
$scd=mysqli_query($conn,"SELECT noq FROM `test_tbl` WHERE test_id='$tid'");
$dd=mysqli_fetch_assoc($scd);
$j=$dd['noq'];
$ar=array();
$sc=mysqli_query($conn,"SELECT tq_id FROM `test_question` WHERE test_id='$tid'");
$uid=$_SESSION['user_id'];
$i=0;

while($d=mysqli_fetch_assoc($sc))
{
array_push($ar,$d['tq_id']);
//echo $ar[$i];
}
shuffle($ar);


for ($a=0;$a<$j;$a++)
{

        $qid = $ar[$a];

        mysqli_query($conn, "INSERT INTO test_attempt (test_id,qid,answer,status,user_id) VALUES($tid,$qid,'0','1',$uid)");


}
?>

        <script>
            popitup("test.php?t_id=<?=$tid?>");
            function popitup(a)
            {
               window.location.href=a;
            }
        </script>


