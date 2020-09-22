<?php
  
  require_once('../service/userService_doc.php');
  if (isset($_GET['error']))
  {
    if($_GET['error'] == 'null')
    {
      echo "Fill the form first";
    }
    
    if($_GET['error'] == 'null_name')
    {
      echo "name cannot be null";
    }

    if($_GET['error'] == 'name_letter')
    {
      echo "Name must start with a letter";
    }

    if($_GET['error'] == 'name_word')
    {
      echo "Name must be at least two words";
    }
    if($_GET['error'] == 'null_email')
    {
      echo "email cannot be null";
    }

    if($_GET['error'] == 'email_notvalid')
    {
      echo "Enter Your Email properly";
    }

    if($_GET['error'] == 'null_password')
    {
      echo "Password cannot be null";
    }
    if($_GET['error'] == 'notmatched')
    {
      echo "Password did not match";
    }
    if($_GET['error'] == 'null_gender')
    {
      echo "Gender cannot be empty";
    }
    if($_GET['error'] == 'null_dob')
    {
      echo "Date of Birth cannot be empty";
    }
    if($_GET['error'] == 'null_dept')
    {
      echo "Department of Expertise cannot be empty";
    }
    if($_GET['error'] == 'null_city')
    {
      echo "City cannot be empty";
    }
    if($_GET['error'] == 'null_day')
    {
      echo "Consulting day cannot be empty";
    }
    if($_GET['error'] == 'null_time')
    {
      echo "Consulting Time cannot be empty";
    }
  }
  
    
?>
<html>
<head>
  <title>Doctor Registration</title>
  <link href="../assets/docReg.css" rel="stylesheet">
  <script type="text/javascript" src="../assets/docReg.js"></script>
</head>
  <body>
  <h1 id="h1">Doctor-Patient Portal</h1>
      
    <div class="table">
    <table>
        <tr>
          <td> <p>Please Enter Information To Register.</p></td>
        </tr>
        <tr>
          <td>
            <form name="registration_form" action="../php/docRegcheck.php" onsubmit="return register()" method="post">
              <fieldset>
                  <table>
                    <tr>
                      <td>Name</td>
                      <td><input type="text" id="name" name="name" onkeyup="keyupName()" onblur="onblurName()"></td>
                    </tr>
                    <tr><td colspan="2" id="eName" align="center"></td></tr>
                    <tr>
                      <td>Email</td>
                      <td><input id="email" name="email" type="text" onkeyup="keyupEmail()" onblur="onblurEmail()"><abbr title="hint:sample@example.com"> ?</abbr></td>
                    </tr>
                    <tr><td colspan="2" id="eEmail"></td></tr>                    
                    <tr>
                      <td>Password</td>
                      <td><input id="password" name="password" type="password" onkeyup="keyupPass()" onblur="onblurPass()"></td>  
                    </tr>
                    <tr><td colspan="2" id="ePass"></td></tr>
                    <tr>
                      <td>Confirm Password</td>
                      <td><input id="confirmPassword" name="confirmPassword" type="password" onkeyup="keyupConPass()" onblur="onblurConPass()"></td>
                    </tr>   
                    <tr><td colspan="2" id="eConPass"></td></tr>
                    <tr>
                      <td>Gender</td>
                      <td>
                  
                        <input name="gender" type="radio" value="1" onclick="onclickGender()">Male
                        <input name="gender" type="radio" value="2" onclick="onclickGender()">Female
                        <input name="gender" type="radio" value="3" onclick="onclickGender()">Other
                      </td>
                      
                    </tr>
                    <tr><td colspan="2" id="eGender"></td></tr>
                    <tr>
                      <td>Date of Birth</td>
                      <td>
                        <input id="dob" name="dob" type="date" onkeyup="keyupDob()" onblur="onblurDob()">
                      </td>
                    </tr>   
                    <tr><td colspan="2" id="eDob"></td></tr>
                    <tr>
                     <tr>
                      <td>Department of Expertise</td>
                      <td>
                        <input id="dept" name="dept" type="text" onkeyup="keyupdept()" onblur="onblurdept()">
                      </td>
                    </tr>   
                    <tr><td colspan="2" id="eDept"></td></tr>
                    <tr> 
                    <tr>
                      <td>City</td>
                      <td>
                        <input id= "city" name="city" type="text" onkeyup="keyupcity()" onblur="onblurcity()">
                      </td>
                    </tr>   
                    <tr><td colspan="2" id="eCity"></td></tr>
                    <tr>
                    <tr>
                      <td>Consulting Day</td>
                      <td>
                        <input id="day" name="day"  type="text" onkeyup="keyupday()" onblur="onblurday()">
                      </td>
                    </tr>   
                    <tr><td colspan="2" id="eday"></td></tr>
                    <tr>
                    <tr>
                      <td>Consulting Time</td>
                      <td>
                        <input id="time" name="time" type="text" onkeyup="keyuptime()" onblur="onblurtime()">
                      </td>
                    </tr>   
                    <tr><td colspan="2" id="eTime"></td></tr>
                    <tr>
                    <td colspan="2" align="center">
                        <input id="registration" type="submit" name="submit" value="Register">
                        <input id="reset" name ="reset" type="reset" value="Reset">
                      </td>
                    </tr>
                  </table>
              </fieldset>
            </form>
          </td>
        </tr>
    </table>
    </div>
  </body>
</html>
<?php 




 ?>