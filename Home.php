<?php
include('lock.php');

//switch depending on which button is pressed for account deletion and signing out
if($_SERVER["REQUEST_METHOD"] == "POST")
{

//TODO: overwrite team information in database

$TeamMembers=implode(',', array($_POST['Player1'], $_POST['Player2'], $_POST['Player3'], $_POST['Player4'], $_POST['Player5'], $_POST['Player6']);

$sql='update TEAMS set TEAM_NAME=$TeamName,TEAM_MEMBERS=$TeamMembers where TEAM_NUMBER=$login_session;'
$result=mysqli_query($db,$sql);

header("Location: Home.php");

}
else
{

//TODO: retrieve names from the team list
$sql = 'select TEAM_MEMBERS,TEAM_NAME from TEAMS where TEAM_NUMBER=$login_session;'
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

$TeamName=$row['TEAM_NAME'];
$TeamMembers=explode(',', $row['TEAM_MEMBERS']);

$player1=$TeamMembers[0];
$player2=$TeamMembers[1];
$player3=$TeamMembers[2];
$player4=$TeamMembers[3];
$player5=$TeamMembers[4];
$player6=$TeamMembers[5];
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
<input type="submit" value=" Apply Changes "/><br />
</form>
</p>
<input type="submit" value=" Sign Out "/><br />
<input type="submit" value=" Delete Team Application "/><br />
</body>