<?php
include 'Lock.php';
include 'TeamInfoTools.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{		
	//Apply Changes
	if(isset($_POST['btnSubmit']))
	{
		//TODO: Make this work with php function in other file
		
		//$Errors=VerifyTeamInfoPost($_POST);
		//if(count($Errors)==0)
		//{
			global $TeamID;
			UpdateTeamInfoRowPost($_POST,$TeamID);
			header("Refresh:0");
		//}
				
	}
	//Sign Out
	else if(isset($_POST['btnSignOut']))
	{
		//TODO: get this to work AT ALL
		header("Location: SignOut.php");
	}
	//Delete Application
	else if(isset($_POST['btnDelete']))
	{
		global $TeamID;
		//TODO: get this to work AT ALL
		DeleteTeamInfoRow($TeamID);
		header("Location: SignOut.php");
	}

}
else
{

global $TeamID;

//TODO: retrieve names from the team list
$sql = sprintf("SELECT Player1,Player2,Player3,Player4,Player5,Player6,Player7,TeamName,EmContactName1,EmContactName2,EmContactName3,EmContactName4,EmContactName5,EmContactName6,EmContactName7,EmContactInfo1,EmContactInfo2,EmContactInfo3,EmContactInfo4,EmContactInfo5,EmContactInfo6,EmContactInfo7,ContactInfo FROM TeamInfo WHERE TeamID=%d;",$TeamID);
if($result=$Teamdb->query($sql))
{

$row=$result->fetch_assoc();


$count=$result->num_rows;
//$count = 0;

if($count == 0)
{
	echo 'Error Retrieving Account Data';
}
else
{
	global $TeamName,$Player1,$Player2,$Player3,$Player4,$Player5,$Player6,$Player7,$EmContactName1,$EmContactName2,$EmContactName3,$EmContactName4,$EmContactName5,$EmContactName6,$EmContactName7,$EmContactInfo1,$EmContactInfo2,$EmContactInfo3,$EmContactInfo4,$EmContactInfo5,$EmContactInfo6,$EmContactInfo7,$ContactInfo;

	$TeamName=$row['TeamName'];
	$ContactInfo=$row['ContactInfo'];

	$Player1=$row['Player1'];
	$Player2=$row['Player2'];
	$Player3=$row['Player3'];
	$Player4=$row['Player4'];
	$Player5=$row['Player5'];
	$Player6=$row['Player6'];
	$Player7=$row['Player7'];
	
	$EmContactName1=$row['EmContactName1'];
	$EmContactName2=$row['EmContactName2'];
	$EmContactName3=$row['EmContactName3'];
	$EmContactName4=$row['EmContactName4'];
	$EmContactName5=$row['EmContactName5'];
	$EmContactName6=$row['EmContactName6'];
	$EmContactName7=$row['EmContactName7'];
	
	$EmContactInfo1=$row['EmContactInfo1'];	
	$EmContactInfo2=$row['EmContactInfo2'];
	$EmContactInfo3=$row['EmContactInfo3'];
	$EmContactInfo4=$row['EmContactInfo4'];
	$EmContactInfo5=$row['EmContactInfo5'];
	$EmContactInfo6=$row['EmContactInfo6'];
	$EmContactInfo7=$row['EmContactInfo7'];


}
}
else
{
	echo 'Error Retrieving Account Data';
}
}
?>
<html>
<body>
<h1>Welcome Team #<?php echo $TeamNumber; ?></h1>

<form id="TeamEditor" method="POST" action="">

<p>
<h2>Your Team</h2>
<?php

global $Errors;
if(isset($Errors))
{
echo '<h2><font color="red">One or More Errors Occured:</font></h2>';
$errorList="<ul>";

foreach($Errors as $value)
{
$errorList += "<li>'$value'</li>'";
}

$errorList="</ul>";
echo $errorList;
}


include 'TeamEditor.php';

DisplayTeamForm(false);
?>
 
<script src="ParseInput.js"></script>
<script src="DisplayErrors.js"></script>
<script src="DeleteAccount.js"></script>

<button name='btnSubmit' value='Apply' onclick="ParseInput(false,false); return false;"> Apply Changes </button><br />
<button name='btnSignOut' value='SignOut'> Sign Out </button><br />
<button name='btnDelete' value='DeleteAccount' onclick="DeleteAccount(); return false;"> Delete Team Application </button><br />
</form>
</p>
</body>
</html>
