<?php
    session_start();

    include "../config/dbConnection.php";

    if (isset($_SESSION['whatsupchat_user_id'])) {
        header("Location: ./chatpage.php");
        exit;
    }

    define('TIMEZONE', 'Africa/Douala');
    date_default_timezone_set(TIMEZONE);

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordconfirm = $_POST['passwordconfirm'];

    $data = "fullname=$fullname&email=$email";

    // validation section
    if (empty($fullname)) { 
        $error = "Full Name cannot be empty";
        header("Location: ../views/register.php?$data&error=" . $error);
        exit;
    } else if (empty($email)) {
        $error = "Email cannot be empty";
        header("Location: ../views/register.php?$data&error=" . $error);
        exit;
    } else if (empty($password)) {
        $error = "The password cannot be empty";
        header("Location: ../views/register.php?$data&error=" . $error);
        exit;
    }
    else if ($passwordconfirm !== $password) {
        $error = "The passwords do not match";
        header("Location: ../views/register.php?$data&error=" . $error);
        exit;
    }
    // Ensuring that the email is not used by another user.
    $sql1 = "SELECT * FROM users WHERE email = ?";

    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute([$email]);

    if ($stmt1->rowCount() === 1) {
        // this code will run if the email already exist
        $message = "This email is already being used by another user";
        header("Location: ../views/login.php?email=$email&message=$message");
        exit;
    }


    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql2 = "INSERT INTO users (`fullname`, `email`, `password`) VALUES (?, ?, ?)";
    $stmt2 = $conn->prepare($sql2);
    $result = $stmt2->execute([$fullname, $email, $password]);
    if ($result) {
        $message = "The account was successfully created, You can now login";
        // redirecting the user to the login page wth the message
        header("Location: ../views/login.php?email=$email&message=$message");
        exit;
    }

    $error = "An error occurred while creating the account";
    header("Location: ../views/register.php?error=". $error);
?>
