<?php
error_reporting(0);


  include('../dbcon.php');

   $rollno = $_POST['rollno'];
   $name = $_POST['fname'];
   $city = $_POST['city'];
   $pcont = $_POST['pcont'];
   $std = $_POST['std'];
   $id = $_POST['sid'];

   $imagename = $_FILES['simg']['name'];
   $tempname = $_FILES['simg']['temp_name'];
   
  
   move_uploaded_file($tempname,"../dataimg/$imagename");

   $query = "UPDATE `student` SET `rollno` = '$rollno',`name` = '$name',`city`= '$city', `pcont`= '$pcont', `standard`= '$std', `image`= '$imagename' WHERE 
   `id` = '$id'";

   $sql = mysqli_query($conn,$query);

   if($sql == TRUE)
   {
    ?>
      <script>

      alert("DATA UPDATE SUCCESSFULLY");
      window.open('updateform.php?sid=<?php echo $id;?>','_self');

      </script>
     <?php
    
   }
   else{
     echo "data could not inserted".mysqli_error($conn);
   }
    


?>
