function DeleteAccount()
{
//prompt the user
var x;
if(confirm("Are you Sure you Want To Delete your Application?")==true)
{
	//delete the account
	var form = document.getElementById("TeamEditor");
	var btnDelete = document.createElement("input");
	btnDelete.setAttribute("type","hidden");
	btnDelete.setAttribute("name","btnDelete");
	form.appendChild(btnDelete);
	form.submit();
}

}
