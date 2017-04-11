<?php
/**
 * Created by PhpStorm.
 * User: worldwiki
 * Date: 30/12/16
 * Time: 7:34 PM
 */
include "include/config.php";
$qid=$_GET['qid'];
$sx=mysqli_query($conn,"SELECT * FROM `test_attempt` inner JOIN test_question ON test_attempt.q_id=test_question.tq_id WHERE test_attempt.tapid=$qid" );
while($ms=mysqli_fetch_assoc($sx)){
?>
<table><tr><td><b>Q:<?=$ms['question']?></b><br/>
                </td></tr>
            <tr><td><p><input type="radio" id="a" name="ans" value="a"  onclick="set_ans(this);">A:<?=$ms['a']?></p></td></tr>
        <tr><td><p><input type="radio" id="b" name="ans" value="b" onclick="set_ans(this);">B:<?=$ms['b']?></p></td></tr>
        <tr><td><p><input type="radio" id="c" name="ans" value="c" onclick="set_ans(this);">C:<?=$ms['c']?></p></td></tr>
        <tr><td><p><input type="radio" id="d" name="ans" value="d" onclick="set_ans(this);">D:<?=$ms['d']?></p></td></tr></table>
<?php }
    ?>
