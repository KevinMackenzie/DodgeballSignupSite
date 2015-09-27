

<body>

<h1>Team Dodgeball Signup</h1>

<?php
if($noErrors == false)
{
echo '<h2><font color="red">One or More Errors Occured</font></h2>';
}
?>

</form action="" method="POST">
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