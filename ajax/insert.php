<?php

    session_start();

    if (!isset($_SESSION['whatsupchat_session_id'])) {
        header("Location: login.php");
        exit;
    }

    // including the database configuration file
    include '../config/dbConnection.php';

    // Checking if the data from the post request arrived
    if (isset($_POST['message']) && isset($_POST['to_id'])) {
        $message = $_POST['message'];
        $to_id = $_POST['to_id'];
        $from_id = $_SESSION['whatsupchat_session_id'];

        $insertQuery = 'INSERT INTO `message` (from_id, to_id, `message`) VALUES (?, ?, ?)';
        $stmt = $conn->prepare($insertQuery);
        $result = $stmt->execute([$from_id, $to_id, $message]);
        
        if ($result) {
            ?>
            <div class="message sender">
                <p><?= $message  ?></p>
                <!-- <span><?= $result['created_at'] ?></span>   -->
            </div>

            <?php 
            } else {
                header("Location: ../views/chatpage.php");
                exit;
        }
    }
?>