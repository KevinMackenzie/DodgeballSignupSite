<?php
session_start();
$_SESSION['TeamID']=-1;
if(session_destroy())
{
header("Location: Login.php");
die();
}
?>
