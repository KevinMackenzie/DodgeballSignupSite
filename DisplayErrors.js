function DisplayErrors()
{

if(Errors.length != 0)
{

var str="<h2>One or More Errors Occured:</h2> <br><ul>";

for(i = 0; i < Errors.length; i++)
{
str += "<li> " + Errors[i] + "</li><br>";
}
str += "</ul>";
var result=str.fontcolor("red");
document.getElementById("errorspace").innerHTML=result;

}

}


