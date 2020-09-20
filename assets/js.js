function keyupDName()
			{
				var dName = document.getElementById('dName').value;
				var xhttp = new XMLHttpRequest();
				xhttp.open('POST', '../php/operation.php', true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('dName='+dName);

				xhttp.onreadystatechange = function ()
				{
					if(this.readyState == 4 && this.status == 200)
					{

						if(this.responseText != "")
						{
							document.getElementById('searchdata').innerHTML = this.responseText;
						}
						else
						{
							document.getElementById('searchdata').innerHTML = "hfjkjjh";
						}
						
					}	
				}
			}
