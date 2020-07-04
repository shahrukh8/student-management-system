
<?php
include('titlehead.php');
?>

<?php

session_start();
   
if(isset($_SESSION['uid']))
{
 
}
else
{
   header('location: ../login.php');  
}

 ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"></link>
        <script src="../js/bootstrap.min.js"></script>

    <title>admin panel</title>

</head>
<body align="center" bgcolor="yellow">

    
    <div class="dashboard">

  <table align="center" border="1">
     <tr>
       <td>1. <a href="addstudent.php">ADD STUDENTS</a></td>
     </tr>

     <tr>
       <td>2. <a href="updatestudent.php">UPDATE STUDENT INFO</a></td>
     </tr>

     <tr>
       <td>3. <a href="deletestudent.php">DELETE DATA FROM STUDENTS</a></td>
     </tr>
      
  </table>
    </div>
 </body>

 </html>
