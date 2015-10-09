<?php
include 'cfg.php';

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
if(isset($_POST['NewAccount']))
{
header("location: CreateNew.php");
$_SESSION['redirSource'] = true;
die();
}
else
{
// username and password sent from Form
$myusername=$_POST['username'];
$mypassword=$_POST['password'];

$sql="SELECT Password,TeamID FROM TeamLogin WHERE TeamID='$myusername';";
$result=$Logindb->query($sql);
$row=$result->fetch_assoc();
//$active=$row['active'];
$count=$result->num_rows;

if($count==1)
{
	if(password_verify($mypassword, $row['Password']))
	{
		$_SESSION['TeamID']=$row['TeamID'];

		header("location: Home.php");
	}	
}

//this means something went wrong :(

$error="Your Login ID or Password is Invalid";

}
}
?>
<html>
<body>

<h1>Welcome to the 2015 Class of 2017 Dodgeball Fundraser</h2><br><br><br>

<?php

global $error;
if(isset($error))
{
echo "<h2><font color=\"red\"> " . $error . "</font></h2>";
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
</body>
</html>
