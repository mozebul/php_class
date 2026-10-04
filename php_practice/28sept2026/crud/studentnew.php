<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>student entry form</h3>

    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        // Data entry form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        include_once('dbconfig.php'); // data connection
           $conn->query(" INSERT INTO allstudents (id, name, email,phone) VALUES 
                        (NULL, '$name', '$email', '$phone')");
                        


    }
    ?>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Enter name"><br><br>
        <input type="text" name="email" placeholder="Enter email"><br><br>
        <input type="text" name="phone" placeholder="Enter phone"><br><br>
        <input type="submit" name="submit" value="SAVE">
    </form>
    <br>
    <a href="index.php">Back to student list</a> <br><br>
</body>
</html>