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
<title>forgotton password form</title>
<link href="style1.css" rel="stylesheet" type="text/css">
<style type="text/css">

.loginform
{
 position:relative;
 top:120px;
 left:500px;
 width:430px;
 height:50px;
 
 background-color:rgba(2999,0,40,.7);             <!-- red,green,blue,alpha(opacity)-->
                           <!-- top-left,top-right,bottom-right,bottom-left-->
      <!--     x-axis y-axis blur-value spread-value  color-value -->
  box-shadow:6px 6px 10px rgba(0,0,0,0.8); 
  display:inline-block;
 <!-- -webkit-transform:rotate(6deg);               <!-- skew(3deg,4deg);-->
  
}
#passwd
{

 position:absolute;
 top:320px;
 left:500px;
 width:430px;
 height:50px;
 background-color:rgba(2500,0,40,.7);
 box-shadow:0px 0px 10px 10px rgba(0,0,0,0.9);  
 transform:rotate(-5deg);  
 border-radius:30px 0px 30px 0px;

             <!-- red,green,blue,alpha(opacity)-->
                           <!-- top-left,top-right,bottom-right,bottom-left-->
      <!--     x-axis y-axis blur-value spread-value  color-value -->
 }
#text
{
  margin-left:95px;
  margin-top:16px;
  color:white;
  font-weight:bold;
}
#pas
{
  position:relative;
  left:226px;
  bottom:22px;
  color:black;
  font-weight:bold;
  font-size:20px;
}

}
</style>
</head>
<body>
<div id="header">
<h1 style="color:white;font-family:bookman;position:relative;top:45px;left:170px;">friendsbook</h1>
<h3><a href="login.php" style="color:red;float:left;margin-left:40px;position:relative;top:5px;">Back</a></h3>
</div>                              <!-- header is closed -->

<div id="body1">

<div class="loginform" style="border-radius:20px 0px 20px 0px;box-shadow:-6px 6px 6px 6px">
<form action="forgottonp.php" method="post">
<table align="center" border="0"  cellspacing="0" style="position:absolute;margin-left:26px;" width="400" height="50" color="red">
<tr>

<td><input type="text" size="34" style="height:24px;border-radius:10px 0px 0px 0px;margin-left:0px;" name="email" placeholder="Enter your email address" required></td>
<td ><input type="submit" name="submit" style="height:24px;font-weight:bold;border-radius:0px 0px 10px 0px;" value="Get password"></td> 

</tr>
</table>

</form>

</div>
<?php
include_once('dbcon.php');
if(isset($_POST['submit']))
{
  $email1=$_POST['email'];
  $query="select * from u_reg where u_email='$email1'";
  $run=mysql_query($query);
  
  $row=mysql_num_rows($run);
 
   if($row<1)
   {
    ?>
       <script>
	    alert('Your email address is Incorrect...!!!');
		window.open('forgottonp.php','_self');
	   </script>
    <?php	
   
   }
   else
   {
          
	while($data=mysql_fetch_array($run))
	{
      $email2=$data['u_email'];
	  $pass2=$data['u_pass'];
	  if($email2==$email1)
	   break;
	}
	
    echo "<div id='passwd'>"."<p id='text'>"."Your password is : "."<p id='pas'>".$pass2."</p>"."</p>"."</div>";
    		
  }
}

?>


</div>

<div id="foot1">


</div>

</body>
</html>


