<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Subscription Form</h2>
    <?php 

    // $x = 10;

    // //echo isset($x);

    // unset($x);

    // echo isset($x);


        if(isset($_POST['submit'])){
        
        $name = $_POST['name'];
        $email = $_POST['email'];

        echo "You have submitted: <br>";
        echo "Name: ". $name . "<br>";
        echo "Email: ". $email. "<br>";
        }
    
    ?>
    <br>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Enter name"><br>
        <input type="text" name="email" placeholder="Enter email"><br>
        <input type="submit" name="submit" value="Subscribe">
    </form> 

</body>
</html>