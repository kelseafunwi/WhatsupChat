<?php
    session_start();

    if (isset($_SESSION['whatsupchat_user_id'])) {
        header("Location: ./chatpage.php");
        exit;
    }

    // validation sectoin
    if (!isset($_POST['fullname'])) { 
        $error = "The fullname cannot be empty";
        header("Location: ../views/register.php?error=" . $error);
        exit;
    } 
    else if (!isset($_POST['email'])) {
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
    else if (isset($_POST['passwordconfirm']) && $_POST['passwordconfirm'] !== $_POST['password']) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $data = "fullname=$fullname&email=$email";
        $error = "The passwords do not match";
        header("Location: ../views/register.php?$data&error=" . $error);
        exit;
    }
    header("Location: ../views/login.php");
    echo "everything was successful";
    exit;    
?>
