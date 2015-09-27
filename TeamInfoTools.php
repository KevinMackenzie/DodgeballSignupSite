<?PHP
include("cfg.php");

function CreateTeamInfoRow($PlayerNames, $TeamName, $TeamId)
{
$sql=sprintf("INSERT INTO TeamInfo(TeamName,TeamNumber,Player1,Player2,Player3,Player4,Player5,Player6) VALUES('%s','%d','%s','%s','%s','%s','%s','%s');", mysql_real_escape_string($TeamName), $TeamId, mysql_real_escape_string($PlayerNames[0]), mysql_real_escape_string($PlayerNames[1]), mysql_real_escape_string($PlayerNames[2]), mysql_real_escape_string($PlayerNames[3]), mysql_real_escape_string($PlayerNames[4]), mysql_real_escape_string($PlayerNames[5]));
$result=mysql_query($Teamdb,$sql);


return true;
}

function UpdateTeamInfoRow($PlayerNames,$TeamName,$TeamId)
{


$sql=sprintf("UPDATE TeamInfo SET TeamName='%s',Player1='%s',Player2='%s',Player3='%s',Player4='%s',Player5='%s',Player6='%s' WHERE TeamID='%d';", mysql_real_escape_string($TeamName), mysql_real_escape_string($PlayerNames[0]), mysql_real_escape_string($PlayerNames[1]), mysql_real_escape_string($PlayerNames[2]), mysql_real_escape_string($PlayerNames[3]), mysql_real_escape_string($PlayerNames[4]), mysql_real_escape_string($PlayerNames[5]), $TeamId);
$result=mysql_query($Teamdb,$sql);

return true;
}


?>
