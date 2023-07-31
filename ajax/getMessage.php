<?php

    // get and append all of the opened messages
    session_start();

    if (!isset($_SESSION['whatsupchat_session_id'])) {
        header("Location: login.php");
        exit;
    }

    // including the database configuration file
    include '../config/dbConnection.php';
 
    if (isset($_POST['to_id'])) {
        $to_id = $_POST['to_id'];
        $from_id = $_SESSION['whatsupchat_session_id'];
        // get all of the messages from the database
        $chatsQuery = 'SELECT * FROM `message`
                            WHERE ( from_id = ? AND to_id = ? )
                            OR (to_id = ? AND from_id = ?) ORDER BY message_id ASC';
        $statement = $conn->prepare($chatsQuery);
        $statement->execute([$from_id, $to_id, $from_id, $to_id]);

        // retrive all of the chats that i have had with this person
        $allChats = $statement->fetchAll();
        $opened = 1;
        foreach ($allChats as $chat) {
            // appending only the unopened messages to the screen of the user
            if ($chat['opened'] == 0 && $chat['from_id'] != $from_id) { 
                $chat_id = $chat['message_id'];
                $markOpenQuery = 'UPDATE `message` SET opened = ? WHERE message_id = ?';
                $markOpenStatement = $conn->prepare($markOpenQuery);
                $markOpenStatement->execute([$opened, $chat_id]);
            ?>
                <div class="message receiver">
                    <p><?= $chat['message']  ?></p>
                    <span><?= $chat['created_at'] ?></span>  
                </div>
        <?php }
        }
        
    } else {
        header("Location: ../index.php");
        exit;
    }

?>