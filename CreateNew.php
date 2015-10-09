<?php
include 'cfg.php';
include 'TeamInfoTools.php';

if($_SERVER["REQUEST_METHOD"] === "POST")
{
if(isset($_POST['btnSubmit']))
{

global $Errors;
//still check for errors here as a last resort
//$Errors = VerifyTeamInfoPost($_POST);

if(count($Errors) == 0)
{	

$password=password_hash($_POST['pw'], PASSWORD_BCRYPT);
$sql=sprintf("INSERT INTO TeamLogin(Password) VALUES('%s');", $password);

$result=$Logindb->query($sql);

if($result == FALSE)
{
	$noErrors = false;
}

$sql=sprintf("SELECT TeamID FROM TeamLogin WHERE Password='%s';", $password);


if($result = $Logindb->query($sql))
{

$row=$result->fetch_assoc();

$TeamID=$row['TeamID'];

$noErrors=CreateTeamInfoRowPost($_POST,$TeamID);

}



if($noErrors == true)
{
session_start();
$_SESSION['TeamID']=$TeamID;

header("location: Home.php");
die();
}
}

}
}

?>
<html>
<body>

<h1>Team Dodgeball Signup</h1>


<form id="TeamEditor" action="" method="POST">
<?php

global $Errors;

if(isset($Errors) && count($Errors) > 0)
{
echo "<h2><font color=\"red\">Errors Occured; form data was unable to be saved</font></h2>";
}

for($x=0;$x<count($Errors);$x++)
{
global $Errors;
echo $Errors[$x];
echo "<br>";
}


include 'TeamEditor.php';

DisplayTeamForm(true);
?>

<script src="ParseInput.js"></script>
<script src="DisplayErrors.js"></script>

<input type="checkbox" id="license">I Accept the <a href="Rules.html">Terms of Application and Play</a></input>
<button name='btnSubmit' onclick="ParseInput(true,true); return false;" >Submit Team Signup</button>
</form>

</body>
</html>
