<!Doctype html>
<html>
<head>
<title>www.friendsbook.com</title>
<link href="style1.css" rel="stylesheet" type="text/css">
<style type="text/css">
#header
{
  background-color:#0c2461;
  
}
#body1
{
  margin:0px;
  background-color:gray;
}



</style>
</head>
<body>
<div id="header">
<h1 style="color:white;font-family:;position:relative;top:45px;left:170px;">friendsbook</h1>

<h3><a href="login.php" style="color:red;float:right;margin-right:140px;">Log In</a></h3>

</div>                              <!-- header is closed -->

<div id="body1">
<div class="signup">
<?php
include_once('signup.php');
?>
</div>

</div>
<div id="foot1">
</div>
</body>
</html>

