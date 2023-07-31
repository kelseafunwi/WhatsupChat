<?php
    session_start();

    if (!isset($_SESSION['whatsupchat_session_id'])) {
        header("Location: ./login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../vendor/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="../vendor/aos/aos.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <title>Whatsup Chat</title>
</head>
<body>
   <section class="container-fluid">
        <button id="logoutBtn" class="btn btn-primary">Logout of this account</button>
   </section> 

    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../vendor/aos/aos.js"></script>
    <script>
        $(document).ready(function () {
            $("#logoutBtn").on('click', function () {
                $.get('../Actions/logout.php');
            });
        });
    </script>
    <script src="../assets/js/index.js"></script>
</body>
</html>