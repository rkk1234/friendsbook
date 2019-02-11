<?php
session_start();
if(!@$_SESSION['umsg'])
{
  header('location:index.php');
}

$umsg1=$_SESSION['umsg'];
$uname1=$_SESSION['uname'];
$uemail=$_SESSION['uemail'];
$upass=$_SESSION['upass'];
$ucpass=$_SESSION['ucpass'];
echo $umsg1;  


?>

<!Doctype html>
<html>
<head>
<title>www.chatfriends.com</title>
<link href="style1.css" rel="stylesheet" type="text/css">
<style type="text/css">
#header
{
  background-color:#0c2461;
  
 }
 #body1
{
  margin:0px;
  background-color:#ff7979;
}
.gmailcode
{
  margin:0px;
  position:absolute;
  top:170px;
  left:450px;

}



</style>
</head>
<body>
<div id="header">

<h1 style="color:white;font-family:;position:relative;top:45px;left:170px;">friendsbook</h1>


</div>                              <!-- header is closed -->

<div id="body1">
<div class="gmailcode">

<form method="post" method="gmailcode.php">
<pre>
<h1 style="font-size:44px;font-weight:bold;">Verification</h1> 

<input type="text" name="vcode" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter verification code" size="39" style="height:34px; border-radius:15px 15px 0px 0px;" required>

<input type="submit" name="submit"  value="Verify" style="height:34px;width:305px;border-radius:15px 15px 0px 0px;background-color:blue;color:white;border-color:blue;">
</pre>
                        </form>

<?php

include_once('dbcon.php');
if(isset($_POST['submit']))
{
  $vcode=$_POST['vcode']; 
  if($vcode!=$umsg1)
  {
    ?>
    <script>
	 alert('Incorrect verification code...!!!');
     window.open('gmailcode.php','_self');  
    </script>
   <?php
    exit();   
   }
   else
   {
    $query1="INSERT INTO u_reg(u_name, u_email,u_pass,uc_pass) VALUES ('$uname1','$uemail','$upass','$ucpass')";
    $run1=mysqli_query($con,$query1);
	if($run1==true)
	 {
       echo "<script>alert('Now Your account has been created successfully...!!!');window.open('logout.php','_self');</script>";
	 }
	 
	exit();
  }
 }
?>
</div>

</div>
<div id="foot1">
</div>
</body>
</html>





