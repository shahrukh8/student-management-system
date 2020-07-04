

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
 <?php

include('titlehead.php');
include('../dbcon.php');


$sid = $_GET['sid'];

$query = "SELECT * FROM STUDENT WHERE id='$sid'";

$run = mysqli_query($conn,$query);

$data = mysqli_fetch_assoc($run);

?>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"></link>
        <script src="../js/bootstrap.min.js"></script>

<form method="POST" action="updatedata.php" enctype="multipart/form-data">

<table align="center" width="50%" border="1">  
 <tr>
   <th>Roll no: </th>   
   <td><input type="text" name="rollno" value=<?php echo $data['rollno'];?> required></td>
 </tr>

 <tr>
   <th>Full name: </th>   
   <td><input type="text" name="fname"  value=<?php echo $data['name'];?> required></td>
 </tr>

 <tr>
   <th>City: </th>   
   <td><input type="text" name="city" value=<?php echo $data['city'];?> required></td>
 </tr>

 <tr>
   <th>Parents contact:</th>   
   <td><input type="text" name="pcont" value=<?php echo $data['pcont'];?> required></td>
 </tr>

 <tr>
   <th>Standard</th>   
   <td><input type="text" name="std" value= <?php echo $data['standard'];?> required></td>
 </tr>

 <tr>
   <th>upload image</th>   
   <td><input type="file" name="simg"></td>
 </tr>

 <tr>
   
   <td colspan="2"  align="center">
   <input type="hidden" name="sid" value="<?php echo $data['id']; ?>" />   
   <input type="submit" name="submit" class="btn btn-primary"></td>
 </tr>
 </table>


</form>

