<?php
include('include/config.php');
if(isset($_POST['save']))
{
          $testid=$_GET['testid'];
          $question=$_POST['question'];
          $rans=$_POST['rightans'];
          $a=$_POST['a'];
          $b=$_POST['b'];
          $c=$_POST['c'];
          $d=$_POST['d'];
          $scv=mysqli_query($conn,"INSERT INTO `test_question`(`test_id`, `question`, `a`, `b`, `c`, `d`, `correct_ans`)
          VALUES ('$testid','$question','$a','$b','$c','$d','$rans')");
          header('location:addQuestion.php?testid='.$testid.'&done=1'); 

}
include('include/header.php');
 ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Question </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-lg-6">
                <form action="" method="post">
                  <div class="form-group">
                    <label>Question</label>
                    <input type="text" name="question" class="form-control" />
                  </div>
                  <p class="row">
<div class="col-lg-12">
    <span><h4>Answer (A)</h4></span>
    <input type="text" name="a" class="form-control">
</div>
</p>
<p class="row">
<div class="col-lg-12">
    <span><h4>Answer (B)</h4></span>
    <input type="text" name="b" class="form-control">
</div>
</p>
<p class="row">
<div class="col-lg-12">
    <span><h4>Answer (C)</h4></span>
    <input type="text" name="c" class="form-control">
</div>
</p>
<p class="row">
<div class="col-lg-12">
    <span><h4>Answer (D)</h4></span>
    <input type="text" name="d" class="form-control">
</div>
</p>
    <p class="row">
<div class="col-lg-12">
    <span><h4>Right Answer<small>(Capital Alphabet Only!)</small></h4></span>
    <input type="text" name="rightans" class="form-control">
</div>
</p>
                    <p>

<button class="form-control btn btn-primary" name="save">Add Question</button>
                    </p>
                </form>

              </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php
include('include/footer.php');
?>
