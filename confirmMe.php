<?php
/**
 * Created by PhpStorm.
 * User: WorldWiki
 * Date: 25-03-2017
 * Time: 01:42 PM
 */
include('include/config.php');
$hex=$_GET["hex"];
$query=mysqli_query($conn,"UPDATE user_table SET active='1' WHERE user_password='$hex'");
if($query>0)
{
    header('location:index.php');
}
?>