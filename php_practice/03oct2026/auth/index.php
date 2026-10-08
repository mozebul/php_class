<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { min-height: 100vh; margin: 0; display: grid; place-items: center; background: #f1f5f9; font: 16px Arial, sans-serif; color: #1e293b; }
        .login-card { width: min(320px, calc(100% - 48px)); padding: 24px; border-radius: 10px; background: #fff; box-shadow: 0 8px 24px #0f172a1a; }
        h3 { margin: 0 0 20px; text-align: center; }
        input { box-sizing: border-box; width: 100%; margin-bottom: 12px; padding: 11px; border: 1px solid #cbd5e1; border-radius: 6px; font: inherit; }
        input[type="submit"] { margin: 0; border: 0; background: #2563eb; color: #fff; cursor: pointer; }
        input[type="submit"]:hover { background: #1d4ed8; }
        .login-card h1 { color: #dc2626; font-size: 18px; text-align: center; }
    </style>
</head>
<body>
    <main class="login-card">
    <h3>Login Form</h3>
    <?php 
        if(isset($_POST['submit'])){
                extract($_POST);
                $password = md5($password);
                include_once('dbconfig.php');
                //echo "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
                $result = $conn->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
                if($result->num_rows>0){
                    session_start();
                    $_SESSION['email'] = $email;
                    header("Location: dashboard.php");
                } else {
                    echo "<h1>Login Failed. Try with Difference password</h1>";
                }
        }
    ?>
    <form action="" method="post">
        <input type="email" name="email" placeholder="Enter email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"><br>
        <input type="password" name="password" placeholder="Enter password"><br>
        <input type="submit" name="submit" value="LOGIN">
    </form>
    </main>
</body>
</html>