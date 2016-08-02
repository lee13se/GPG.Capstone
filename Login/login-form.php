<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Form</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<p>&nbsp;</p>

<!-- Title Section -->
<center>
<div class="title"> 

<br />
<img src="/Images/gpg_logo_small.jpg" alt="Gateway Precision Gear" width="190" height="60" align="center"><h1> Welcome to GPG's Production Management System</h1> 



</div></center>

<br /><br />
<br /><br /><br />
<br />

<!-- End Title Section -->

<form id="loginForm" name="loginForm" method="post" action="login-exec.php">
  <table width="300" border="0" align="left" cellpadding="2" cellspacing="0">
    <tr>
      <td width="112"><b>Login</b></td>
      <td width="188"><input name="login" type="text" class="textfield" id="login" /></td>
    </tr>
    <tr>
      <td><b>Password</b></td>
      <td><input name="password" type="password" class="textfield" id="password" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Login" /></td>
    </tr>
  <tr>
      <td>&nbsp;</td>
      <td>Login:Admin</td>
    </tr>
  <tr>
      <td>&nbsp;</td>
      <td>Password:Admin</td>
    </tr>
  </table>
</form>
</body>
</html>
