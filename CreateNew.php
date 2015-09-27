<?php
include('cfg.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	
$password=password_hash($_POST['pw']);
$sql="INSERT INTO TeamLogin(Password) VALUES('$password');"

$result=mysqli_query($Logindb,$sql);

$sql="SELECT TeamID FROM TeamLogin WHERE Password='$password';"

$result=mysqli_query($Logindb,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

$teamId=row['TeamID'];

if($noErrors == true)
{

session_register("teamId");
$_SESSION['login_user']=$teamId;

header("location: Home.php");
die();
}
}

?>

<body>

<h1>Team Dodgeball Signup</h1>

<?php
if($noErrors == false)
{
echo '<h2><font color="red">One or More Errors Occured</font></h2>';
}
?>

<form action="" method="POST">
<table>

	<tr>
		<td>Team Name</td>
		<td><input type="text" name="TeamName"/></td>
	</tr>
	<tr>
		<td>Team Password</td>
		<td><input type="password" name="pw"/></td>
	</tr>
</table>

<h1>Team Members</h1>
<table>
	<tr>
		<td>Players</td>
		<td><input type="text" name="Player1"/></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="text" name="Player2"/></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="text" name="Player3"/></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="text" name="Player4"/></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="text" name="Player5"/></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="text" name="Player6"/></td>
	</tr>
</table>

<input type="submit" text="Submit Team Signup"/>
</form>

</body>