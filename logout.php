<?php
/**
 * Created by PhpStorm.
 * User: Technicus Shubham
 * Date: 10/28/2015
 * Time: 1:41 AM
 */
include('include/config.php');

session_destroy();

header('location:index.php');
