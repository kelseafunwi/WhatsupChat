<?php
    session_start();

    if (!isset($_SESSION['whatsupchat_user_id'])) {
        header("Location: login.php");
        exit;
    } else {
        echo $_SESSION['whatsupchat_user_id'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <title>Whatsup Chat</title>
</head>
<body>
   <section id="chatpage" class="container-fluid">
        
   </section> 

    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            
        });
    </script>
    <script src="../assets/js/index.js"></script>
</body>
</html>