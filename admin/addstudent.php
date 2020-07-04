<?php

include('titlehead.php');

session_start();
   
if(isset($_SESSION['uid']))
{
  echo "";
}
else
{
  ?>
  <script>alert("DATA INSERT SUCCESSFULLY")</script>
  <?php
}
?>
 <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"></link>
        <script src="../js/bootstrap.min.js"></script>

<form action ="addstudent.php"  method ="POST" enctype ="multipart/form-data">

    <table align="center" width="50%" border="1">  
     <tr>
       <th>Roll no: </th>   
       <td><input type="text" name="rollno" placeholder="Enter the roll no" required></td>
     </tr>
   
     <tr>
       <th>Full name: </th>   
       <td><input type="text" name="fname"  placeholder="Enter the Name" required></td>
     </tr>

     <tr>
       <th>City: </th>   
       <td><input type="text" name="city" placeholder="Enter the city" required></td>
     </tr>

     <tr>
       <th>Parents contact:</th>   
       <td><input type="text" name="pcont"placeholder="Enter the parent cont" required></td>
     </tr>

     <tr>
       <th>Standard</th>   
       <td><input type="text" name="std" placeholder="Enter the standard" required></td>
     </tr>

     <tr>
       <th>upload image</th>   
       <td><input class="form-control-file" type="file" name="file" required></td>
     </tr>

     <tr>
       
       <td align="center" colspan="2"><input class="btn btn-success" type="submit" name="submit"></td>
     </tr>
     </table>


</form>
<?php

if(isset($_POST['submit'])){

  include('../dbcon.php');

   $rollno = $_POST['rollno'];
   $name = $_POST['fname'];
   $city = $_POST['city'];
   $pcont = $_POST['pcont'];
   $std = $_POST['std'];

    $path= '../dataimg/';
    $image= $_FILES['file']['name'];
    $tmp_name= $_FILES['file']['tmp_name'];

    move_uploaded_file($tmp_name, $path.$image);

   $query = "insert into student (`rollno`, `name`, `city`, `pcont`, `standard`, `image`) values ('$rollno', '$name', '$city', '$pcont', '$std', '$image')";

   $sql = mysqli_query($conn,$query);

   if($sql == TRUE){
    ?>
      <script>alert("DATA INSERT SUCCESSFULLY")</script>
     <?php
    
   }
   else{
     echo "data could not inserted".mysqli_error($conn);
   }
   
    
}

?>
