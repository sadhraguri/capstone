<?php
/**
 * Created by PhpStorm.
 * User: worldwiki
 * Date: 30/12/16
 * Time: 8:15 PM
 */

include "include/config.php";
$id=$_GET['id'];
$v=$_GET['v'];

$sx=mysqli_query($conn,"UPDATE test_attempt SET answer='$v' WHERE tapid=$id");


    echo 'done';

