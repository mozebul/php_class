<?php include_once("dbconfig.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>
<body>
    <h3>Student LIst</h3>
    <?php 
       $rawData =  $conn->query("SELECT * FROM allstudents"); ?>

    <table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>    
    <?php
       while($row = $rawData->fetch_assoc()){ ?>
          <tr>
            <td><?php echo  $row['id'] ?> </td>
            <td><?php echo  $row['name'] ?></td>
            <td><?php echo  $row['email'] ?></td>
            <td><?php echo  $row['phone'] ?></td>
          </tr>
      <?php 
        }    
    ?>
    </table>
    
</body>
</html>