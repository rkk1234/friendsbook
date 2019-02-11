<?php
session_start();
if(@$_SESSION['umsg'])
{
  header('location:gmailcode.php');
}

?>

<!doctype html>
<html>
<head>
<title>signup page</title>

</head>
<body>

<form method="post" action="signup.php">
<pre>
<h1 style="font-size:44px;font-weight:bold;">Create a new account</h1> 

<input type="text" name="name" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter your name" size="39" style="height:34px; border-radius:15px 15px 0px 0px;" required>

<input type="text" name="email" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter email address" size="39" style="height:34px;border-radius:15px 15px 0px 0px;" required>

<input type="password" name="pass1" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter your password" size="39" style="height:34px;border-radius:15px 15px 0px 0px;" required>

<input type="password" name="pass2" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter confirm password" size="39" style="height:34px;border-radius:15px 15px 0px 0px;" required>

<input type="submit" name="submit"  value="Create Account" style="height:34px;width:305px;border-radius:15px 15px 0px 0px;background-color:blue;color:white;border-color:blue;">
</pre>
</form>
<?php

include_once('dbcon.php');
if(isset($_POST['submit']))
{
  $uname=$_POST['name']; 
  $uemail=$_POST['email'];
  $upass=$_POST['pass1'];
  $ucpass=$_POST['pass2'];
  if($upass!=$ucpass)
   {
    ?>
    <script>
	 alert('Password not match...!');
     window.open('index.php','_self');  
    </script>
   <?php	
   exit();
    
   }
   else
   {
  
  $query1="select * from u_reg where u_email='$uemail'";
  $run1=mysqli_query($query1);
  while($data=mysqli_fetch_array($run1))
  {
     $email=$data['u_email'];
	 if($email==$uemail)
	  break;
  }
  if(@$email==$uemail)
  { 
  ?>
      <script>alert('This email already exists...!!!');
	          window.open('index.php','_self'); 
	  </script>
 <?php	 
   exit();
  }
  else
  {
   $random_characters="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_:";
   $shuffle_code=str_shuffle($random_characters);
   $to=$uemail;
   $message=substr($shuffle_code,0,6);
   $subject ="Verification Code :"; 
   $headers ="From : sushil kumar shinde<www.friendsbook.com>";
   
   mail($to,$subject,$message,$headers);
  
  echo "<script>alert('Plz check your Gmail account for verification code...!!!');window.open('gmailcode.php','_self');</script>";
  
  
  $_SESSION['umsg']=$message;
  $_SESSION['uname']=$uname;
  $_SESSION['uemail']=$uemail;
  $_SESSION['upass']=$upass;
  $_SESSION['ucpass']=$ucpass;
  
  header('refresh:3;url=gmailcode.php');
   
  }
  }
  }
?>
</body>
</html>

