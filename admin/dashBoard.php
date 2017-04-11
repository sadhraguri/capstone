<?php
include('../include/config.php');

//*****************CHECK LOGIN*******************************//
if(!isset($_SESSION['user_id']) && $_SESSION['user_id']==""){
    header('location:../managecp/index.php');
}
//*****//

include('assets/include/header.php');
?>
<div class="container" style="margin-top: 95px;">
<div class="row">
  <div class="col-lg-12">
    <h1>Welcome Admin</h1>
  </div>
</div>
</div>
<?php
include('assets/include/footer.php');
