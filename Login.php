<?php
include("config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
if(isset($_POST['NewAccount']))
{
header("location: CreateNew.php");
}
else
{
// username and password sent from Form
$myusername=mysqli_real_escape_string($db,$_POST['username']);
$mypassword=mysqli_real_escape_string($db,$_POST['password']);

$sql="SELECT Password FROM TeamLogin WHERE TeamID='$myusername';";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//$active=$row['active'];
$count=mysqli_num_rows($result);

if($count==1)
{
	if(password_verify($mypassword, mysqli_fetch_row($result)['Password']))
	{
		session_register("myusername");
		$_SESSION['login_user']=$myusername;

		header("location: Home.php");
	}	
}

//this means something went wrong :(

$error="Your Login ID or Password is Invalid";

}
}
?>
<form action="" method="post">
<label>Team ID# :</label>
<input type="text" name="username"/><br />
<label>Password :</label>
<input type="password" name="password"/><br/>
<input type="submit" value=" Submit "/><br />
<input type="submit" name="NewAccount" value=" Create New Team "/><br />
</form>