var Errors = [];

function IsAlpha(str)
{
return /^[a-z ]*$/i.test(str);
}
function IsAlphaNum(str)
{
return /^[a-z0-9\-() ]*$/i.test(str);
}
function IsValidName(str,len)
{
return IsAlpha(str) && str.length >= len;
}
function IsValidContactInfo(str,len)
{
return IsAlphaNum(str) && str.length >= len;
}


function ParseInput(RequiresAcceptance,RequiresPassword)
{

var Player1 = document.getElementById('Player1').value;
var Player2 = document.getElementById('Player2').value;
var Player3 = document.getElementById('Player3').value;
var Player4 = document.getElementById('Player4').value;
var Player5 = document.getElementById('Player5').value;
var Player6 = document.getElementById('Player6').value;
var Player7 = document.getElementById('Player7').value;

var Emn1 = document.getElementById('EmContactName1').value;
var Emn2 = document.getElementById('EmContactName2').value;
var Emn3 = document.getElementById('EmContactName3').value;
var Emn4 = document.getElementById('EmContactName4').value;
var Emn5 = document.getElementById('EmContactName5').value;
var Emn6 = document.getElementById('EmContactName6').value;
var Emn7 = document.getElementById('EmContactName7').value;

var Emi1 = document.getElementById('EmContactInfo1').value;
var Emi2 = document.getElementById('EmContactInfo2').value;
var Emi3 = document.getElementById('EmContactInfo3').value;
var Emi4 = document.getElementById('EmContactInfo4').value;
var Emi5 = document.getElementById('EmContactInfo5').value;
var Emi6 = document.getElementById('EmContactInfo6').value;
var Emi7 = document.getElementById('EmContactInfo7').value;

var TeamName = document.getElementById('TeamName').value;
var ContactInfo = document.getElementById('ContactInfo').value;

var pwInput=document.getElementById('pw');
var pw="";
if(RequiresPassword)
{
pw = pwInput.value;
}
var lic = false;
if(RequiresAcceptance)
{
lic = document.getElementById('license').checked;
}

Errors = ParseTeamFormData(Player1,
Player2,
Player3,
Player4,
Player5,
Player6,
Player7,
Emn1,
Emn2,
Emn3,
Emn4,
Emn5,
Emn6,
Emn7,
Emi1,
Emi2,
Emi3,
Emi4,
Emi5,
Emi6,
Emi7,
TeamName,
ContactInfo,
pw,
lic,
RequiresAcceptance,
RequiresPassword);

//post the form if there were no errors
if(Errors.length == 0)
{
var form = document.getElementById("TeamEditor");
var postData = document.createElement("input");
postData.setAttribute("type","hidden");
postData.setAttribute("name","btnSubmit")
form.appendChild(postData);
form.submit();
}
else
{
DisplayErrors();
}
}

function ParseTeamFormData(p1,p2,p3,p4,p5,p6,p7,emN1,emN2,emN3,emN4,emN5,emN6,emN7,emI1,emI2,emI3,emI4,emI5,emI6,emI7,TeamName,ContactInfo,Password,Acceptance,RequiresAcceptance,RequiresPassword)
{

var ErrorsInt = [];
if(Acceptance == false && RequiresAcceptance == true)
{
ErrorsInt = ["Please Accept the License Agreement"];
}

if(!(IsValidName(p1,7) &&
IsValidName(p2,7) &&
IsValidName(p3,7) &&
IsValidName(p4,7) &&
IsValidName(p5,7) &&
IsValidName(p6,7) &&
(IsValidName(p7,7) || p7.length == 0) &&
(IsValidName(emN1,7) || emN1.length == 0) &&
(IsValidName(emN2,7) || emN2.length == 0) &&
(IsValidName(emN3,7) || emN3.length == 0) &&
(IsValidName(emN4,7) || emN4.length == 0) &&
(IsValidName(emN5,7) || emN5.length == 0) &&
(IsValidName(emN6,7) || emN6.length == 0) &&
(IsValidName(emN7,7) || emN7.length == 0)
))
{
ErrorsInt.push("Player Names must be at least 7 English Letters or Spaces Long (Add Spaces if your name does not meet said requirements)");
}


if(!IsValidName(TeamName,3))
{
ErrorsInt.push("Team Names must be at least 3 English Letters Long");
}

if(!
(IsValidContactInfo(ContactInfo,7) &&
IsValidContactInfo(emI1,7) &&
IsValidContactInfo(emI2,7) &&
IsValidContactInfo(emI3,7) &&
IsValidContactInfo(emI4,7) &&
IsValidContactInfo(emI5,7) &&
IsValidContactInfo(emI6,7) &&
(IsValidContactInfo(emI7,7) || emI7.length == 0)
))
{
ErrorsInt.push("Contact Information Must be at least 7 English Letters, Numbers, Parentheses, Hyphens, or Spaces");

}

if(Password.length < 5 && RequiresPassword)
{
ErrorsInt.push("Passwords must be at least 5 characters long, but we recommend more that that");
}

return ErrorsInt;
}
