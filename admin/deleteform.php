<?php
error_reporting(0);


  include('../dbcon.php');

   $id = $_REQUEST['sid'];

   $query = "DELETE FROM STUDENT WHERE id= '$id'";

   $sql = mysqli_query($conn,$query);

   if($sql == TRUE)
   {
    ?>
      <script>

      alert("DATA DELETE SUCCESSFULLY");
      window.open('deletestudent.php','_self');

      </script>
     <?php
    
   }
   else{
     echo "data could not inserted".mysqli_error($conn);
   }
    


?>
