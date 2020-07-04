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

<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"></link>
        <script src="../js/bootstrap.min.js"></script>

<table align="center" border="1">

 <form method="POST" action="updatestudent.php">

  <tr>

<th>Enter student standard</th>
<td><input type="number" name="standard" placeholder="Enter standard" require="required" /></td>
  </tr>

  <tr>

 <th>Enter student name</th>
 <td><input type="text" name="stuname" placeholder="Enter student name" require="required" /></td>

</tr>
<tr>
 <td colspan="2" align="center"><input class="btn btn-success" type="submit" name="submit" value="Search"></td>
</tr>

 


 </form>

</table>

<table align="center" width="80%" border="1">

<tr style="background-color: #000; color:#fff">
<th>NO</th>
<th>image</th>
<th>name</th>
<th>Rollno</th>
<th>Edit</th>
</tr>

<?php

if(isset($_POST['submit'])){

   include('../dbcon.php');

   $std = $_POST['standard'];
   $name = $_POST['stuname'];

   $sql = "SELECT * FROM STUDENT WHERE standard ='$std' AND name LIKE '%$name%'";

   $run = mysqli_query($conn,$sql);

   if(mysqli_num_rows($run)<1)
   {
      echo "<tr><td colspan='5'>NO Records Founds</td></tr>";
   }
   else{

      $count = 0;
      while($data=mysqli_fetch_assoc($run)){

          $count++;
          ?>
    <tr align="center">
      <td><?php echo $count; ?></td>
      <td><img src="../dataimg/<?php echo $data['image']; ?>"style="width:100px;" /></td>
      <td><?php echo $data['name']; ?></td>
      <td><?php echo $data['rollno']; ?></td>
      <td><a href="updateform.php?sid=<?php echo $data['id'];?>"  class="btn btn-primary">Edit</a></td>
    </tr>
          <?php
      }
   }
}


?>


</table>
