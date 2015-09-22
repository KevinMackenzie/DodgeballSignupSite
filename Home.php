<?php
include('Lock.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST['btnApply']))
	{
		$TeamMembers=implode(',', array($_POST['Player1'], $_POST['Player2'], $_POST['Player3'], $_POST['Player4'], $_POST['Player5'], $_POST['Player6']);

		$sql="update TeamInfo set TeamName=$TeamName,Player1='$_POST['Player1']',Player2='$_POST['Player2']',Player3='$_POST['Player3']',Player4=$_POST['Player4']',Player5='$_POST['Player5']',Player6='$_POST['Player6']' where TeamID=$login_session;"
		$result=mysqli_query($Teamdb,$sql);
				
	}
	else if(isset($_POST['btnSignOut']))
	{
		header("Location: SignOut.php");
	}
	else if(isset($_POST['btnDelete']))
	{
		$sql="DELETE FROM TeamInfo WHERE TeamID='$login_session';";
		$result=mysql_query($Teamdb, $sql);
		header("Location: Login.php");
	}

header("Location: Home.php");

}
else
{

//TODO: retrieve names from the team list
$sql = "select Player1,Player2,Player3,Player4,Player5,Player6,TeamName from TeamInfo where TeamID='$login_session';"
$result=mysqli_query($Teamdb,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

$count=mysqli_num_rows($result);

if($count == 0)
{
	echo 'Error Retrieving Account Data';
}
else
{
	$TeamName=$row['TeamName'];

	$player1=$row['player1'];
	$player2=$row['player2'];
	$player3=$row['player3'];
	$player4=$row['player4'];
	$player5=$row['player5'];
	$player6=$row['player6'];
}
}
?>
<body>
<h1>Welcome <?php echo $login_session; ?></h1>

<p>
<h2>Your Team</h2>
<form action="" method="post">
 <table style="width:100%">
 Team Information:
  <tr>
	<td>Team Name</td>
	<td><input type="text", name="name" <?php echo 'text="$TeamName"'?> /></td>
  </tr>
  <tr>
	<td>Players</td>
    <td><input type="text" name="Player1" <?php echo 'text="$player1"'?>/></td>
  </tr>
  <tr>
	<td></td>
    <td><input type="text" name="Player2" <?php echo 'text="$player2"'?>/></td>
  </tr>
  <tr>
	<td></td>
    <td><input type="text" name="Player3" <?php echo 'text="$player3"'?>/></td>
  </tr>
  <tr>
	<td></td>
    <td><input type="text" name="Player4" <?php echo 'text="$player4"'?>/></td>
  </tr>
  <tr>
	<td></td>
    <td><input type="text" name="Player5" <?php echo 'text="$player5"'?>/></td>
  </tr>
  <tr>
	<td></td>
    <td><input type="text" name="Player6" <?php echo 'text="$player6"'?>/></td>
  </tr>
</table> 
<input type="submit" name=="btnApply" value=" Apply Changes "/><br />
<input type="submit" name=="btnSignOut" value=" Sign Out "/><br />
<input type="submit" name=="btnDelete" value=" Delete Team Application "/><br />
</form>
</p>
</body>