<?php
    session_start();

    include '../config/dbConnection.php'; 

    // Redirecting the user to the messaging page if the user is already logged in
    if (isset($_SESSION['whatsupchat_session_id'])) {
        header("Location: ./chatpage.php");
        exit;
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (!isset($email)) {
        $error = "The email cannot be empty";
        header("Location: ../views/login.php?error=$error");
        exit;
    } else 
    if (!isset($password)) {
        $data = "email=$email";
        $error = "The password cannot be empty";
        header("Location: ../views/login.php?$data&error=" . $error);
        exit;   
    }

    // check if the email exist in the database
    $sql1 = "SELECT * FROM users WHERE email = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute([$email]);

    if ($stmt1->rowCount() === 1 ) {
        $userInfo = $stmt1->fetch();
        if (password_verify($password, $userInfo['password'])) {
            // creating the session data
            
            // Login the User is basically about creating a unique identification in which that user can access
            // that identity from their browser (Each browser creates its own session in the server)
            $_SESSION['whatsupchat_session_id'] = $userInfo['user_id'];
            $_SESSION['fullname'] = $userInfo['fullname'];
            $_SESSION['email'] = $userInfo['email'];
            
            header("Location: ../views/chatpage.php");
            return;
        } 
        $data = "email=$email";
        $error = "Incorrect Password";
        header("Location: ../views/login.php?$data&error=" . $error);  
        exit;
    } else {
        $data = "email=$email";
        $error = "The email does not exit";
        header("Location: ../views/login.php?$data&error=" . $error);
        exit;  
    }
?>
