<?php 
     session_start();
    if($_SESSION['email']!=true){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body { min-height: 100vh; margin: 0; display: grid; place-items: center; background: #f1f5f9; color: #1e293b; font: 16px Arial, sans-serif; }
        main { width: min(480px, calc(100% - 48px)); padding: 24px; border-radius: 10px; background: #fff; box-shadow: 0 8px 24px #0f172a1a; }
        h1 { margin-top: 0; font-size: 24px; }
        pre { overflow-wrap: anywhere; padding: 12px; border-radius: 6px; background: #f8fafc; }
        a { display: inline-block; padding: 10px 14px; border-radius: 6px; background: #2563eb; color: #fff; text-decoration: none; }
        a:hover { background: #1d4ed8; }
    </style>
</head>
<body>
    <main>
    <h1>Welcome to Dashboard</h1>
    <?php 
       
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
    ?>
    <a href="logout.php">Logout</a>
    </main>
</body>
</html>