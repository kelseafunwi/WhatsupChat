<?php

    // function to get all of the conversation information and display it to us
    /*  @param $user_id -> the user we will retrieve all information (the currently signed in user)
    *   @param $conn -> the connection from the database
    */

    function getConversation($user_id, $conn) {
        $conversationSql = 'SELECT * FROM conversations WHERE user_1 = ? OR user_2 = ? ORDER BY conversation_id DESC'; 

        $stmt = $conn->prepare($conversationSql);
        $stmt->execute([$user_id, $user_id]);
        if ($stmt->rowCount() > 0) {
            $conversations = $stmt->fetchAll();

            $allReceivers = [];

            foreach($$conversations as $conversation) {
                
                if ($conversation['user_1'] == $user_id) {
                    // if i am user_1 is me
                    $receiver = 'SELECT * FROM users WHERE user_id = ?';
                    $personStmt = $conn->prepare($receiver);
                    $personStmt->execute([$conversation['user_2']]);
                } else {
                    $personSql = 'SELECT * FROM users WHERE user_id = ?';
                    $personStmt = $conn->prepare($personSql);
                    $personStmt->execute($conversation['user_1']);
                }

                // This ends up with information about the user whom i am commmunicating with.
                $recieverInfo = $personStmt->fetch();

                // an array containing information abou thte user whom i am communicating with.
                array_push($allReceivers, $recieverInfo);
            }

            return $allReceivers;
        } else {
            $userConversation = [];
            return $userConversation;
        }
    }
?>