<?php
include('include/config.php');
define("UPLOAD_DIR", "uploads/");
if(isset($_POST['addAssignment']))
{

  $uploaded_by=$_SESSION['user_id'];
  $subject=$_POST['subject'];
  $class=$_POST['class'];
  $s="INSERT INTO `assignment_tbl`(`class_id`, `subject_id`, `uploaded_by`) VALUES ('$class','$subject','$uploaded_by')";
  // echo $s;
  $ins=mysqli_query($conn,$s);
  if(mysqli_insert_id($conn)!="")
  {
      $assi=mysqli_insert_id($conn);
      echo $assi;
      $myFiles = $_FILES["docs"]['name'];
      $myFile = $_FILES["docs"];

      if ($myFile["error"] !== UPLOAD_ERR_OK) {
          echo "<p>An error occurred.</p>";
          exit;
      }
      // ensure a safe filename
      $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

      // don't overwrite an existing file
      $i = 0;
      $parts = pathinfo($name);
      while (file_exists(UPLOAD_DIR . $name)) {
          $i++;
          $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
      }

      // preserve file from temporary directory
      $success = move_uploaded_file($myFile["tmp_name"],UPLOAD_DIR . $name);
      if (!$success) {
          echo "<p>Unable to save file.</p>";
          exit;
      }
      // set proper permissions on the new file
      chmod(UPLOAD_DIR . $name, 0644);
      $sql1="UPDATE `assignment_tbl` SET `docs`='$name' WHERE `assignment_id`='$assi'";
      $xe=mysqli_query($conn,$sql1);
      header('location: upload_assignment.php');
  }
}
 ?>
