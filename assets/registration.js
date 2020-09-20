function keyupName()
{
	var name = document.getElementById('name').value;
	if(name=="")
	{
		document.getElementById('eName').innerHTML = "Enter Your Name first";
	}
	else
	{
		document.getElementById('eName').innerHTML = "";
	}
}

function onblurName()
{
	var name = document.getElementById('name').value;
	if(name=="")
	{
		document.getElementById('eName').innerHTML = "Enter Your Name first";
	}
	else
	{
		if((name.charAt(0) < 'a' || name.charAt(0) > 'z') && (name.charAt(0) < 'A' || name.charAt(0) > 'Z'))
		{
			document.getElementById('eName').innerHTML="Name must start with a letter";
		}
		else if(name.split(" ").length<2)
		{
			document.getElementById('eName').innerHTML="Name must be at least two words";
		}
		else
		{
			document.getElementById('eName').innerHTML = "";
		}
	}
}

function keyupEmail()
{
	var email = document.getElementById('email').value;
	if(email=="")
	{
		document.getElementById('eEmail').innerHTML = "Enter Your Email first";
	}
	else if(email!="")
	{
		document.getElementById('eEmail').innerHTML = "";
	}
}

function onblurEmail()
{
	var email = document.getElementById('email').value;
	if(email=="")
	{
		document.getElementById('eEmail').innerHTML = "Enter Your Email first";
	}
	else
	{
		if(email.indexOf("@")<0 || (email.indexOf(".com")<0 && email.indexOf(".edu")<0 && email.indexOf(".org")<0)) 
		{
			document.getElementById('eEmail').innerHTML = "Enter Your Email properly";
		}
		
		else
		{
			var xhttp = new XMLHttpRequest();
			xhttp.open('POST', '../php/pat_regcheck.php', true);
			xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhttp.send('email='+email);
			
			xhttp.onreadystatechange = function ()
			{
				if(this.readyState == 4 && this.status == 200)
				{
					if(this.responseText != "")
					{
						document.getElementById('eEmail').innerHTML = this.responseText;
					}
					else
					{
						document.getElementById('eEmail').innerHTML = "";
					}
				}
			}
		}
	}
}

function keyupPass()
{
	var pass = document.getElementById('password').value;
	if(pass=="")
	{
		document.getElementById('ePass').innerHTML = "Enter Your Password first";
	}
	else if(pass!="")
	{
		if(pass.length<4)
		{
			document.getElementById('ePass').innerHTML = "The password is too weak";
		}
		else if(pass.length<6)
		{
			document.getElementById('ePass').innerHTML = "moderate";
		}
		else
		{
			document.getElementById('ePass').innerHTML = "strong";
		}
	}
}

function onblurPass()
{
	var pass = document.getElementById('password').value;
	if(pass=="")
	{
		document.getElementById('ePass').innerHTML = "Enter Your Password first";
	}
	else if(pass!="")
	{
		document.getElementById('ePass').innerHTML = "";
	}
}

function keyupConPass()
{
	var pass = document.getElementById('password').value;
	var conPass = document.getElementById('confirmPassword').value;
	if(conPass=="")
	{
		document.getElementById('eConPass').innerHTML = "Confirm your Password first";
	}
	else if(conPass!="")
	{
		if(conPass==pass)
		{
			document.getElementById('eConPass').innerHTML = "matched";
		}
		else
		{
			document.getElementById('eConPass').innerHTML = "not matched";
		}
	}
}

function onblurConPass()
{
	var conPass = document.getElementById('confirmPassword').value;
	if(conPass=="")
	{
		document.getElementById('eConPass').innerHTML = "Confirm Your Password first";
	}
	else if(conPass!="")
	{
		if(conPass=!pass)
		{
			document.getElementById('eConPass').innerHTML = "not matched";
		}
		else
		{
			document.getElementById('eConPass').innerHTML = "matched";
		}
	}
}

function onclickGender()
{
	var gender = document.forms['registration_form']['gender'].value;
	if(gender!="")
	{
		document.getElementById('eGender').innerHTML = "";
	}
}

function keyupDob()
{
	var dob = document.getElementById('dob').value;
	if(dob=="")
	{
		document.getElementById('eDob').innerHTML = "Enter Your Date of Birth first";
	}
	else if(dob!="")
	{
		document.getElementById('eDob').innerHTML = "";
	}
}

function onblurDob()
{
	var dob = document.getElementById('dob').value;
	if(dob=="")
	{
		document.getElementById('eDob').innerHTML = "Enter Your Date of Birth first";
	}
	else if(dob!="")
	{
		document.getElementById('eDob').innerHTML = "";
	}
}

function register()
{
	var name = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var pass = document.getElementById('password').value;
	var conPass = document.getElementById('confirmPassword').value;
	var gender = document.forms['registration_form']['gender'].value;
	var dob = document.getElementById('dob').value;
	
	if(name=="" || email=="" || pass=="" || conPass=="" || gender=="" || dob=="")
	{
		if(name==""){document.getElementById('eName').innerHTML = "Enter Your Name first";}
		if(email==""){document.getElementById('eEmail').innerHTML = "Enter Your Email first";}
		if(pass==""){document.getElementById('ePass').innerHTML = "Enter Your Password first";}
		if(conPass==""){document.getElementById('eConPass').innerHTML = "Confirm Your Password first";}
		if(gender==""){document.getElementById('eGender').innerHTML = "Enter your Gender";}
		if(dob==""){document.getElementById('eDob').innerHTML = "Enter Your Date of Birth first";}
		return false;
	}
	else
	{
		document.getElementById('eName').innerHTML = "";
		document.getElementById('eEmail').innerHTML = "";
		document.getElementById('ePass').innerHTML = "";
		document.getElementById('eConPass').innerHTML = "";
		document.getElementById('eGender').innerHTML = "";
		document.getElementById('eDob').innerHTML = "";
		return true;
	}
}

function validate()
{
	var name = document.getElementById('name').value;
	var dob = document.getElementById('dob').value;
	
	if(name=="" || dob=="")
	{
		if(name==""){document.getElementById('eName').innerHTML = "Enter Your Name first";}
		if(dob==""){document.getElementById('eDob').innerHTML = "Enter Your Date of Birth first";}
		return false;
	}
	else
	{
		document.getElementById('eName').innerHTML = "";
		document.getElementById('eDob').innerHTML = "";
		return true;
	}
}

function onkeyupContact()
{
	var contact = document.getElementById('contact').value;
	if(contact=="")
	{
		document.getElementById('eContact').innerHTML = "Enter Your Contact first";
	}
	else
	{
		if(contact.length!=9)
		{
			document.getElementById('eContact').innerHTML = "Enter Your Contact properly";
		}
		else
		{
			document.getElementById('eContact').innerHTML = "";
		}
	}
}

function onblurContact()
{
	var contact = document.getElementById('contact').value;
	if(contact=="")
	{
		document.getElementById('eContact').innerHTML = "Enter Your Contact first";
	}
	else
	{
		if(contact.length!=9)
		{
			document.getElementById('eContact').innerHTML = "Enter Your Contact properly";
		}
		else
		{
			document.getElementById('eContact').innerHTML = "";
		}
	}
}

function validateP()
{
	var name = document.getElementById('name').value;
	var dob = document.getElementById('dob').value;
	var contact = document.getElementById('contact').value;
	
	if(name=="" || dob=="" || contact=="")
	{
		if(name==""){document.getElementById('eName').innerHTML = "Enter Your Name first";}
		if(dob==""){document.getElementById('eDob').innerHTML = "Enter Your Date of Birth first";}
		if(contact==""){document.getElementById('eContact').innerHTML = "Enter Your Contact number";}
		return false;
	}
	else
	{
		document.getElementById('eName').innerHTML = "";
		document.getElementById('eDob').innerHTML = "";
		document.getElementById('eContact').innerHTML = "";
		return true;
	}
}

function registerPatient()
{
	var name = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var contact = document.getElementById('contact').value;
	var pass = document.getElementById('password').value;
	var conPass = document.getElementById('confirmPassword').value;
	var gender = document.forms['registration_form']['gender'].value;
	var dob = document.getElementById('dob').value;
	
	if(name=="" || email=="" || contact=="" || pass=="" || conPass=="" || gender=="" || dob=="")
	{
		if(name==""){document.getElementById('eName').innerHTML = "Enter Your Name first";}
		if(email==""){document.getElementById('eEmail').innerHTML = "Enter Your Email first";}
		if(contact==""){document.getElementById('eContact').innerHTML = "Enter Your Contact first";}
		if(pass==""){document.getElementById('ePass').innerHTML = "Enter Your Password first";}
		if(conPass==""){document.getElementById('eConPass').innerHTML = "Confirm Your Password first";}
		if(gender==""){document.getElementById('eGender').innerHTML = "Enter your Gender";}
		if(dob==""){document.getElementById('eDob').innerHTML = "Enter Your Date of Birth first";}
		return false;
	}
	else
	{
		document.getElementById('eName').innerHTML = "";
		document.getElementById('eEmail').innerHTML = "";
		document.getElementById('eContact').innerHTML = "";
		document.getElementById('ePass').innerHTML = "";
		document.getElementById('eConPass').innerHTML = "";
		document.getElementById('eGender').innerHTML = "";
		document.getElementById('eDob').innerHTML = "";
		return true;
	}
}