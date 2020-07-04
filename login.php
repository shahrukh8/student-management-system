
<?php
include('admin/header.php');

?>
<?php

session_start();

if(isset($_SESSION['uid']))

{
   header('location:admin/admindash.php');
}

?>

<html>
<head>
    <title>admin panel</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"></link>
        <script src="js/bootstrap.min.js"></script>
</head>

<body align="center" bgcolor="yellow">

<h2 align="center">Admin Login</h2>
<form method="POST" action="login.php">

<table align="center" border="1" cellspacing="0" style="width: 30%" height="15%">

 <tr> 
     <td>Username</td><td><input type="text" name="username" required> </td>
 </tr>

  <tr>
      <td>password</td><td><input type="password" name="pass" required> </td>
  </tr>

  <tr>
      <td colspan="2" align="center"><input class="btn btn-success" type="submit" name="login" value="Login"> </td>
  </tr>

</table>



</form>
<?php

include('dbcon.php');

 if(isset($_POST['login']))
 {

$username = $_POST['username'];
$password = $_POST['pass'];


$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

$run = mysqli_query($conn,$query);

$row = mysqli_num_rows($run);

if($row <1)
{

?>
<script>
  alert('username or password not match !!!?"');
  window.open('login.php','_self');

</script>
  <?php
}

else{
   $data = mysqli_fetch_assoc($run);
   
   $id = $data['id'];

   $_SESSION['uid']=$id;

   header('location: admin/admindash.php');
   }

}

?>
</body>

</html>