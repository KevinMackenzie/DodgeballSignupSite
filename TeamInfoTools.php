<?PHP

function Force7Elements(&$Array)
{
for($i=count($Array);$i<7;$i++)
{
$Array[$i]='';
}
}

function VerifyTeamInfoPost($PostArray)
{

return VerifyTeamInfo(array($PostArray["Player1"],$PostArray["Player2"],$PostArray["Player3"],$PostArray["Player4"],$PostArray["Player5"],$PostArray["Player6"]), $PostArray["ContactInfo"], array($PostArray["EmContactName1"],$PostArray["EmContactName2"],$PostArray["EmContactName3"],$PostArray["EmContactName4"],$PostArray["EmContactName5"],$PostArray["EmContactName6"],$PostArray["EmContactName7"]), array($PostArray["EmContactInfo1"],$PostArray["EmContactInfo2"],$PostArray["EmContactInfo3"],$PostArray["EmContactInfo4"],$PostArray["EmContactInfo5"],$PostArray["EmContactInfo6"],$PostArray["EmContactInfo7"]), $PostArray["TeamName"]);

}


function VerifyTeamInfo($PlayerNames,$ContactInfo,$EmergencyContactNames,$EmergencyContactInfos,$TeamName)
{

Force7Elements($PlayerNames);
Force7Elements($EmergencyContactNames);
Force7Elements($EmergencyContactInfos);



if(strlen($ContactInfo) < 7)
{
$ErrorCode["ContactInfo"]="Main Contact Information must be at least 7 characters/numbers long";
}

if(strlen($TeamName) < 3 || !ctype_alpha($TeamName))
{
$ErrorCode["ContactInfo"]="Team Name Must be More than 3 English Characters";
}

foreach($PlayerNames as $PlayerName)
{

if((strlen($PlayerName) < 7 || $PlayerName !== $PlayerNames[6]) || !ctype_alpha($PlayerName))
{
	$ErrorCode[$PlayerName]=sprintf("'%s' Is Not A Valid Name (At Least 7 English Characters)",$PlayerName);
}

}

//no tests for emergency contact names (They are optional)
foreach($EmergencyContactNames as $ContactName)
{
if(strlen($ContactName) < 7 && strlen($ContactName) != 0)
{
$ErrorCode[$ContactName]=sprintf("'%s' Is Not A Valid Emergency Contact Name (At Least 7 Characters)",$ContactName);
}
}


foreach($EmergencyContactInfos as $ContactInfo)
{

if(strlen($ContactInfo) < 7 || $ContactInfo !== $EmergencyContactInfos[6])
{
	$ErrorCode[$ContactInfo]=sprintf("'%s' Is Not A Valid Emergency Contact Method (At Least 7 Characters)",$ContactInfo);
}
}

return $ErrorCode;
}


function CreateTeamInfoRowPost($PostArray,$TeamId)
{
return CreateTeamInfoRow(array($PostArray["Player1"],$PostArray["Player2"],$PostArray["Player3"],$PostArray["Player4"],$PostArray["Player5"],$PostArray["Player6"],$PostArray["Player7"]), $PostArray["ContactInfo"], array($PostArray["EmContactName1"],$PostArray["EmContactName2"],$PostArray["EmContactName3"],$PostArray["EmContactName4"],$PostArray["EmContactName5"],$PostArray["EmContactName6"],$PostArray["EmContactName7"]), array($PostArray["EmContactInfo1"],$PostArray["EmContactInfo2"],$PostArray["EmContactInfo3"],$PostArray["EmContactInfo4"],$PostArray["EmContactInfo5"],$PostArray["EmContactInfo6"],$PostArray["EmContactInfo7"]), $PostArray["TeamName"],$TeamId);

}

function CreateTeamInfoRow($PlayerNames, $ContactInfo, $EmergencyContactNames, $EmergencyContactInfos, $TeamName, $TeamId)
{
Force7Elements($PlayerNames);
Force7Elements($EmergencyContactNames);
Force7Elements($EmergencyContactInfos);

global $Teamdb;

$sql=sprintf("INSERT INTO TeamInfo(TeamName,TeamID,Player1,Player2,Player3,Player4,Player5,Player6,Player7,EmContactName1,EmContactName2,EmContactName3,EmContactName4,EmContactName5,EmContactName6,EmContactName7,EmContactInfo1,EmContactInfo2,EmContactInfo3,EmContactInfo4,EmContactInfo5,EmContactInfo6,EmContactInfo7,ContactInfo) VALUES('%s','%d','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');",$TeamName, $TeamId,$PlayerNames[0], $PlayerNames[1], $PlayerNames[2], $PlayerNames[3], $PlayerNames[4], $PlayerNames[5], $PlayerNames[6], $EmergencyContactNames[0], $EmergencyContactNames[1], $EmergencyContactNames[2], $EmergencyContactNames[3], $EmergencyContactNames[4], $EmergencyContactNames[5], $EmergencyContactNames[6], $EmergencyContactInfos[0], $EmergencyContactInfos[1], $EmergencyContactInfos[2], $EmergencyContactInfos[3], $EmergencyContactInfos[4], $EmergencyContactInfos[5], $EmergencyContactInfos[6], $ContactInfo);

return $Teamdb->query($sql);
}


function UpdateTeamInfoRowPost($PostArray,$TeamId)
{
return UpdateTeamInfoRow(array($PostArray["Player1"],$PostArray["Player2"],$PostArray["Player3"],$PostArray["Player4"],$PostArray["Player5"],$PostArray["Player6"],$PostArray["Player7"]), $PostArray["ContactInfo"], array($PostArray["EmContactName1"],$PostArray["EmContactName2"],$PostArray["EmContactName3"],$PostArray["EmContactName4"],$PostArray["EmContactName5"],$PostArray["EmContactName6"],$PostArray["EmContactName7"]), array($PostArray["EmContactInfo1"],$PostArray["EmContactInfo2"],$PostArray["EmContactInfo3"],$PostArray["EmContactInfo4"],$PostArray["EmContactInfo5"],$PostArray["EmContactInfo6"],$PostArray["EmContactInfo7"]), $PostArray["TeamName"],$TeamId);

}

function UpdateTeamInfoRow($PlayerNames,$ContactInfo,$EmergencyContactNames,$EmergencyContactInfos,$TeamName,$TeamId)
{
Force7Elements($PlayerNames);
Force7Elements($EmergencyContactNames);
Force7Elements($EmergencyContactInfos);

global $Teamdb;

$sql=sprintf("UPDATE TeamInfo SET TeamName='%s',Player1='%s',Player2='%s',Player3='%s',Player4='%s',Player5='%s',Player6='%s',Player7='%s' ,ContactInfo='%s' ,EmContactName1='%s' ,EmContactName2='%s' ,EmContactName3='%s' ,EmContactName4='%s' ,EmContactName5='%s' ,EmContactName6='%s' ,EmContactName7='%s' ,EmContactInfo1='%s',EmContactInfo2='%s',EmContactInfo3='%s',EmContactInfo4='%s',EmContactInfo5='%s',EmContactInfo6='%s',EmContactInfo7='%s' WHERE TeamID=%d;", $TeamName, $PlayerNames[0], $PlayerNames[1], $PlayerNames[2], $PlayerNames[3], $PlayerNames[4], $PlayerNames[5], $PlayerNames[6], $ContactInfo, $EmergencyContactNames[0], $EmergencyContactNames[1], $EmergencyContactNames[2], $EmergencyContactNames[3], $EmergencyContactNames[4], $EmergencyContactNames[5], $EmergencyContactNames[6], $EmergencyContactInfos[0], $EmergencyContactInfos[1], $EmergencyContactInfos[2], $EmergencyContactInfos[3], $EmergencyContactInfos[4], $EmergencyContactInfos[5], $EmergencyContactInfos[6], $TeamId);

return $Teamdb->query($sql);
}

function DeleteTeamInfoRow($TeamId)
{

global $Teamdb,$Logindb;


$sql = "DELETE FROM TeamInfo WHERE TeamID='$TeamId'";
if(!$Teamdb->query($sql))
{
//issue happened
return false;
}




$sql = "DELETE FROM TeamLogin WHERE TeamID='$TeamId'";
if(!$Logindb->query($sql))
{
//issue happened
return false;
}


return true;
}


?>
