<?php
session_start();
if(@$_SESSION['uname'])
{
  header('location:chatpage.php');
}

?>
<!Doctype html>
<html>
<head>
<title>login form</title>
<link href="style1.css" rel="stylesheet" type="text/css">
<style type="text/css">
#header
{
  
  width:100%;
  background-color:#0c2461;
  height:100px;
 }

#body1
{
  margin:0px;
  background-color:gray;
  height:600px;
}

.loginform
{
 clear:both;
 position:relative;
 top:120px;
 left:480px;
 width:400px;
 height:340px;
 background-color:rgba(2999,0,40,.7);             <!-- red,green,blue,alpha(opacity)-->
 border-radius:15px;                             <!-- top-left,top-right,bottom-right,bottom-left-->
      <!--     x-axis y-axis blur-value spread-value  color-value -->
  box-shadow:6px 6px 10px rgba(0,0,0,0.8); 
 
 <!-- -webkit-transform:rotate(6deg);               <!-- skew(3deg,4deg);-->
  
}

</style>
</head>
<body>
<div id="header">
<h1 style="color:white;font-family:bookman;position:relative;top:45px;left:170px;">friendsbook</h1>
<h3><a href="index.php" style="color:red;float:left;margin-left:40px;position:relative;top:5px;">Back</a></h3>
</div>                              <!-- header is closed -->

<div id="body1">

<div class="loginform" style="border-radius:15px;box-shadow:-6px 6px 6px 6px">
<form action="login.php" method="post">
<table align="center" border="0"  cellspacing="0" style="margin-left:10px;" width="400" height="340" color="red">
<tr>
   <td colspan="2" align="center" style="color:white;font-family:sans sherif;"><h1> Login Form </h1></td>
</tr>
<tr>
<td align="right" style=""><h3>Email:</h3></td>
<td><input type="text" size="34" style="height:20px;border-radius:0px 12px 0px 0px;" name="email" required></td>
</tr>
<tr>
<td align="right"><h3>Password:</h3></td>
<td><input type="password" size="34" style="height:20px;border-radius:0px 12px 0px 0px;" name="pass" required></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit" style="border-radius:2px;font-weight:bold;" value="Log In"><a href="forgottonp.php" style="margin-left:16px;color:black;">Forgotten Password&nbsp;?</a></td> 
</tr>

</table>

</form>

</div>

</div>

<div id="foot1">


</div>

</body>
</html>
<?php
include_once('dbcon.php');
if(isset($_POST['submit']))
{
   $email1=$_POST['email'];
   $pass1=$_POST['pass'];
   $query="select * from u_reg where u_email='$email1' and u_pass='$pass1'";
   $run=mysqli_query($con,$query);
   $row=mysqli_num_rows($run);
   if($row<1)
   {
    ?>
       <script>
	    alert('Your email address or Password is Incorrect...!!!');
		window.open('login.php','_self');
	   </script>
    <?php	
   
   }
   else
   {
          
	while($data=mysqli_fetch_array($run))
	{
    	
	  $email2=$data['u_email'];
	  $pass2=$data['u_pass'];
      $name=$data['u_name'];
	  if($email2==$email1 and $pass2== $pass1)
	   break;
	}
	  
      $_SESSION['uname']=$name;
	  header('location:chatpage.php');
  }
}

?>


