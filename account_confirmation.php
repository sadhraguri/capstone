<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Account Confirmation</title>
<?php include("style.php"); ?>
<style>
body{
	background-image:url(data/clouds-background-light.jpg);
	
	background-attachment:scroll;
	background-position:center;
}
</style>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
	
    <script><?php $hex=$_GET["hex"];?>
    function send_mail()
	{
		//alert('<?php echo $hex;?>');
		 $.get("confirmation.php?hex=<?php echo $hex; ?>", function(data){
		$('#status').html(data);
		 });
	}
	function refresh()
	{
		window.location="confirmation.php?hex=<?php echo $hex; ?>";
	}
    </script>
</head>


<?php
include('include/config.php');


$query="SELECT * FROM  people WHERE hex='$hex'";

$result=$connect->query($query);
$st=0;
$hex;
while($row = $result->fetch_assoc())
{
	$st=1;
	$email=$row["email"];
       break;
	             
}
?>
<body onload="send_mail();"><center>
<img src="admin/assets/img/logo.png" style="height:100px;"/>
<br/><br/><br/>
<div style="background-color:#FFF;  width:50%; box-shadow:2px 2px 3px #666666;">
<div  style="padding-top:40px;padding-bottom:40px;">

	<h1>Congratulations, you have a ENVISIONISTS Account!</h1>
	<div class="loginPanel loginPanelNormal" style="text-align:left; padding:1%;">
	<p class="info">
		We've sent you an email to  <?php echo $email; ?>
		<br/>

	</p>
	
	<p class="subInfo">
		<em>Please note: If you can't find the email, check your spam folder and double check you spelt your email correctly.</em>
	</p>
    <center>Click Here go to home <button onclick="location.href='index.php'">Home</button></center>
</div>
</div></div></center>
<div id="status"><iframe style="display:none;" src="?hex=<?php echo $hex; ?>"></iframe></div>

<br/><br/><br/>
</body>
</html>