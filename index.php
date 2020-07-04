
<html>
<?php
include('admin/header.php');
?>

        
    <head>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"></link>
    <link rel="stylesheet" type="text/css" href="DataTables/css/dataTables.bootstrap.min.css"></link>
    <title>By shahrukh</title>

    


    </head>

<body bgcolor="yellow">
  

   
 <form method="POST" action="index.php">

<table id="table_id" style="width:50%" align="center" border="1" align="center">

    <tr>
    <td colspan="4" align="center">Student Management System</td>
    </tr>

    <tr>
    <td colspan="2" align="left">Choose standard</td>
    <td>
    <select name="std" required>

        <option value="1">1st</option>
        <option value="2">2nd</option>
        <option value="3">3rd</option>
        <option value="4">4th</option>
        <option value="5">5th</option>
        <option value="6">6th</option>
        <option value="7">7th</option>
        <option value="8">8th</option>
        <option value="9">9th</option>
        <option value="10">10th</option>
        <option value="11">11th</option>
        <option value="12">12th</option>

    </select>
    </td>
</tr>

<tr>
    <td colspan="2" align="left">Enter the Rollno</td>
   <td> <input type="text" name="rollno" required></input></td>
</tr>

  <tr>
   <td colspan="3" align="center"> <input class="btn btn-primary" type="submit" name="submit" value="show info"></input></td>
  </tr>
    
    </table>
 </form>
       
        
   
</body>
<script src="DataTables/jquery.js"></script>
<script src="DataTables/js/dataTables.bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
      
        
        
 <script>

   $(document).ready( function() {
    $('#table_id').DataTable();

     } );

</script>
</html>
<?php

if(isset($_POST['submit']))
{
    $std = $_POST['std'];
    $rollno = $_POST['rollno'];

    include('dbcon.php');
    
    

    $sql = "SELECT * FROM `student` WHERE `rollno` = '$rollno' AND `standard` = '$std'";

    $run = mysqli_query($conn,$sql);

          
    if(mysqli_num_rows($run)>0)
    {

     $data = mysqli_fetch_assoc($run);
     
       ?>
       <table id="table_id" class="display" border="1px" align="center" style="width: 50%">
       <thead>
    <tr>
     <th COLSPAN="3">STUDENT DETAILS</th>
    </tr>

       </thead>
       <tbody>
    <tr>
        <td rowspan="5"><img src="dataimg/<?php echo $data['image'];?>" style="max-width: 120px; max-height: 150px; " /></td>
        <th>ROLL NO</th>
        <td><?php echo $data['rollno'];?></td>
    </tr>  
    
    <tr>
        <th>NAME</th>
        <td><?php echo $data['name'];?></td>
    </tr>
    <tr>
        <th>standard</th>
        <td><?php echo $data['standard'];?></td>
    </tr>

    <tr>
        <th>PARENTS CONTACT</th>
        <td><?php echo $data['pcont'];?></td>
    </tr>
    
    <tr>
        <th>CITY</th>
        <td><?php echo $data['city'];?></td>
    </tr>

       </tbody>
    </table>
       <?php
    }
    else{
       echo "<script>alert('NO RECORD FOUNDS');</script>";
    }
}
    
?>

