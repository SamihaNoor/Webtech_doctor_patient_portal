function keyupId()
{
	var id = document.getElementById('id').value;
	if(id=="")
	{
		document.getElementById('eId').innerHTML = "Enter Your Id first";
	}
	else
	{
		document.getElementById('eId').innerHTML = "";
	}
}

function fieldId()
{
	var id = document.getElementById('id').value;
	if(id=="")
	{
		document.getElementById('eId').innerHTML = "Enter Your Id first";
	}
	else
	{
		//if(Number.isInteger(id))
		//{
			document.getElementById('eId').innerHTML = "";
		//}
		//else
		//{
		//	document.getElementById('eId').innerHTML = "Enter Your Id properly";
		//}
	}
}

function keyupPass()
{
	var pass = document.getElementById('password').value;
	if(pass=="")
	{
		document.getElementById('ePass').innerHTML = "Enter Your Password first";
	}
	else
	{
		document.getElementById('ePass').innerHTML = "";
	}
}

function fieldPass()
{
	var pass = document.getElementById('password').value;
	if(pass=="")
	{
		document.getElementById('ePass').innerHTML = "Enter Your Password first";
	}
	else
	{
		document.getElementById('ePass').innerHTML = "";
	}
}

function getInfo()
{
	var id = document.getElementById('id').value;
	var pass = document.getElementById('password').value;
	var rememberme = document.getElementById('rememberme').value;
	
	if(id=="" && pass=="")
	{
		document.getElementById('eId').innerHTML = "Enter Your Id first";
		document.getElementById('ePass').innerHTML = "Enter Your Password first";
		return false;
	}
	else if(id!="" && pass=="")
	{
		document.getElementById('eId').innerHTML = "";
		document.getElementById('ePass').innerHTML = "Enter Your Password first";
		return false;
	}
	else if(id=="" && pass!="")
	{
		document.getElementById('eId').innerHTML = "Enter Your Id first";
		document.getElementById('ePass').innerHTML = "";
		return false;
	}
	else
	{
		document.getElementById('eId').innerHTML = "";
		document.getElementById('ePass').innerHTML = "";
		return true;
	}
}