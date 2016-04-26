<html>
<head>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }
</style>
</head>
<body>
<h1>Login<h1>
<form action='#' method='post'>
<table cellspacing='5' align='center'>
<tr><td>User name:</td><td><input type='text' name='name'/></td></tr>
<tr><td>Password:</td><td><input type='password' name='pwd'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>

</form>
<?php
session_start();
if(isset($_POST['submit']))
{
 mysql_connect('localhost','root','') or die(mysql_error());
 mysql_select_db('new') or die(mysql_error());
 $name=$_POST['name'];
 $pwd=$_POST['pwd'];
 if($name!=''&&$pwd!='')
 {
   $query=mysql_query("select * from login where name='".$name."' and password='".$pwd."'") or die(mysql_error());
   $res=mysql_fetch_row($query);
   if($res)
   {
    $_SESSION['name']=$name;
    header('location:welcome.php');
   }
   else
   {
    echo'You entered username or password is incorrect';
   }
 }
 else
 {
  echo'Enter both username and password';
 }
}
?>
</body>
</html>
