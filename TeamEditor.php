<?php

function DisplayTeamForm($displayPWord)
{

global $TeamName,$ContactInfo,$Player1,$Player2,$Player3,$Player4,$Player5,$Player6,$Player7,$EmContactName1,$EmContactName2,$EmContactName3,$EmContactName4,$EmContactName5,$EmContactName6,$EmContactName7,$EmContactInfo1,$EmContactInfo2,$EmContactInfo3,$EmContactInfo4,$EmContactInfo5,$EmContactInfo6,$EmContactInfo7;

echo "
<h3>Team Information</h3>

<p id=\"errorspace\"></p>
<table style=\"width:460\">

	<tr>
		<td>Team Name</td>
		<td><input type=\"text\" name=\"TeamName\" id=\"TeamName\" value=\"$TeamName\"/></td>
	</tr>";
if($displayPWord)
{
echo "
	<tr>
		<td>Team Password</td>
		<td><input type=\"password\" name=\"pw\" id=\"pw\"/></td>
	</tr>";
}
echo "
	<tr>
		<td>Team Contact Info</td>
		<td><input type=\"text\" name=\"ContactInfo\" id=\"ContactInfo\" value=\"$ContactInfo\"/></td>
	</tr>
</table>

<h3>Team Members</h3>
<table style=\"width:960\">
	<tr>
		<td>Player Name: (\"First Last\")</td>
		<td>Emergency Contact Name (Optional)</td>
		<td>Emergency Contact Information (Email or Phone)</td>
	</tr>
	<tr>
		<td><input type=\"text\" name=\"Player1\" id=\"Player1\" value=\"$Player1\"/></td>
		<td><input type=\"text\" name=\"EmContactName1\" id=\"EmContactName1\" value=\"$EmContactName1\"/></td>
		<td><input type=\"text\" name=\"EmContactInfo1\" id=\"EmContactInfo1\" value=\"$EmContactInfo1\"/></td>
	</tr>
	<tr>
		<td><input type=\"text\" name=\"Player2\" id=\"Player2\" value=\"$Player2\"/></td>
		<td><input type=\"text\" name=\"EmContactName2\" id=\"EmContactName2\" value=\"$EmContactName2\"/></td>
		<td><input type=\"text\" name=\"EmContactInfo2\" id=\"EmContactInfo2\" value=\"$EmContactInfo2\"/></td>
	</tr>
	<tr>
		<td><input type=\"text\" name=\"Player3\" id=\"Player3\" value=\"$Player3\"/></td>
		<td><input type=\"text\" name=\"EmContactName3\" id=\"EmContactName3\" value=\"$EmContactName3\"/></td>
		<td><input type=\"text\" name=\"EmContactInfo3\" id=\"EmContactInfo3\" value=\"$EmContactInfo3\"/></td>
	</tr>
	<tr>
		<td><input type=\"text\" name=\"Player4\" id=\"Player4\" value=\"$Player4\"/></td>
		<td><input type=\"text\" name=\"EmContactName4\" id=\"EmContactName4\" value=\"$EmContactName4\"/></td>
		<td><input type=\"text\" name=\"EmContactInfo4\" id=\"EmContactInfo4\" value=\"$EmContactInfo4\"/></td>
	</tr>
	<tr>
		<td><input type=\"text\" name=\"Player5\" id=\"Player5\" value=\"$Player5\"/></td>
		<td><input type=\"text\" name=\"EmContactName5\" id=\"EmContactName5\" value=\"$EmContactName5\"/></td>
		<td><input type=\"text\" name=\"EmContactInfo5\" id=\"EmContactInfo5\" value=\"$EmContactInfo5\"/></td>
	</tr>
	<tr>
		<td><input type=\"text\" name=\"Player6\" id=\"Player6\" value=\"$Player6\"/></td>
		<td><input type=\"text\" name=\"EmContactName6\" id=\"EmContactName6\" value=\"$EmContactName6\"/></td>
		<td><input type=\"text\" name=\"EmContactInfo6\" id=\"EmContactInfo6\" value=\"$EmContactInfo6\"/></td>
	</tr>
	<tr>
		<td><input type=\"text\" name=\"Player7\" id=\"Player7\" value=\"$Player7\"/></td>
		<td><input type=\"text\" name=\"EmContactName7\" id=\"EmContactName7\" value=\"$EmContactName7\"/></td>
		<td><input type=\"text\" name=\"EmContactInfo7\" id=\"EmContactInfo7\" value=\"$EmContactInfo7\"/></td>
	<td>Optional Substitute Player</td>
	</tr>

</table>
";



}


?>
