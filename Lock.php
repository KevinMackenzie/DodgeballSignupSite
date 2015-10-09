<?php
include 'cfg.php';

session_start();
$user_check=$_SESSION['TeamID'];


$sql="SELECT TeamID FROM TeamLogin WHERE TeamID='$user_check';";
if($TeamNumberRes = $Logindb->query($sql))
{

if($TeamNumberRes == false)
{
header("Location: Login.php");
}

$row=$TeamNumberRes->fetch_assoc();

$TeamNumber=$row['TeamID'];
$TeamID=$TeamNumber;
if(!isset($TeamNumber))
{
header("Location: Login.php");
}
}

?>
