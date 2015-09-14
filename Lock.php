<?php
include('cfg.php');
session_start();
$user_check=$_SESSION['login_user'];

$ses_sql=mysqli_query($db,"select TEAM_NUMBER from teams where TEAM_NUMBER='$user_check' ");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session=$row['TEAM_NUMBER'];

if(!isset($login_session))
{
header("Location: Login.php");
}
?>