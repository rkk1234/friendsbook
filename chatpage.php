<?php
session_start();
if(!@$_SESSION['uname'])
{
  header('location:login.php');
  
}
$name=$_SESSION['uname'];
?>
<!doctype html>
<html>
<head>
<title>chat page</title>
<link href="style1.css" rel="stylesheet" type="text/css">
<style type="text/css">
#header
{
   background-color:#0c2461;
}

#name
{
  
  font-family:comic sans ms;
  font-size:20px;
  color:yellow;
  float:right;
  position:relative;
  right:367px;
  bottom:13px;
}
#text_box
{
  background-color:gray;
  width:680px;
  height:390px;
  float:right;
  position:absolute;
  top:110px;
  right:190px;
  overflow:auto;
  overflow-x:hidden;
  box-shadow:0px 0px 30px 0px rgba(0,0,0,0.8);
  border-radius:20px 0px 0px 0px;
}


#msg_send
{
  
  float:right;
  position:relative;
  top:425px;
  right:436px;
  color:red;
  font-size:23px;
  
}

#msg
{
  
  font-size:20px;
  box-shadow:0px 0px 30px 0px rgba(0,0,0,0.8);
}

#submt
{
 
 border-color:green; 
 color:white;
 background-color:green;
 position:relative;
 bottom:29px; 
 width:80px;
 height:70px;
 font-size:20px; 
 border-radius:10px; 
}
#uname
{
  margin:0px;
  color:white;
  font-family:arial;
  font-size:13px;
  background-color:gray;
  
  
}
</style>
</head>
<body>
<div id="username">
<h3><a href="logout.php" style="color:red;position:relative;top:38px;left:65px;">Log Out</a></h3>
<h1 style="color:white;text-align:center;">Welcome to chat Room</h1>  
<?php echo "<p id='name'>$name</p>"?> 
</div>

<div id="body1">

<div id="sun"> </div>


<div id="text_box">
<?php
include_once('dbcon.php');
$query="select * from user_chat";
$run=mysqli_query($con,$query);
$row=mysqli_num_rows($run);
if($row>0)
{
while($data=mysqli_fetch_array($run))
{
  $id=$data['u_id'];
  $name1=$data['u_name'];
  $text1=$data['u_msg'];
  echo "<p id='uname'>"."&nbsp;&nbsp;&nbsp;&nbsp;".$name1.": ".$text1."</p>";
 }
}
 
?>
</div>

<div id="msg_send">
<form action="chatpage.php" method="post">
 
 
 <textarea type="text" cols="30" rows="3" name="umsg" id="msg" placeholder="Type message for sending..." required></textarea>
 <input type="submit" value="Send" name="submit" id="submt" />

</form>

</div>

</body>
</html>
<?php
include_once('dbcon.php');

if(isset($_POST['submit']))
{
  $msg=@$_POST['umsg'];
  $query="INSERT INTO `user_chat`(`u_name`, `u_msg`) VALUES ('$name','$msg')";
  $run=mysqli_query($con,$query);
  if($run==true)
   {
     ?>
	 <script> 
	 
	  window.open('chatpage.php','_self');
	 </script>
	 <?php
	  
   }   
}
else
{
  ?>
  
  
  <?php
  
}
 exit(); 
?>