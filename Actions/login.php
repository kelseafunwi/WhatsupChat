<?php
    session_start();

    if (isset($_SESSION['whatsupchat_user_id'])) {
        header("Location: ./chatpage.php");
        exit;
    }

    include '../config/dbConnection.php';   

    if (!isset($_POST['email'])) {
        $fullname = $_POST['fullname'];
        $error = "The email cannot be empty";
        $data = "fullname=$fullname";
        header("Location: ../views/register.php?$data&error=" . $error);
        exit;
    }
    else if (!isset($_POST['password'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $data = "fullname=$fullname&email=$email";
        $error = "The password cannot be empty";
        header("Location: ../views/register.php?$data&error=" . $error);
        exit;
    }

    // check if the email exist in the database

    header("Location: ../views/login.php");
    echo "everything was successful";
    exit;    
?>
