<?php

    function getChats($id_1, $id_2, $conn) {
        $chatsQuery = 'SELECT * FROM `message`
                        WHERE ( from_id = ? AND to_id = ? )
                        OR (to_id = ? AND from_id = ?) ORDER BY message_id ASC';
        $statement = $conn->prepare($chatsQuery);
        $statement->execute([$id_1, $id_2, $id_1, $id_2]);

        if ($statement->rowCount() > 0) {
            $chats = $statement->fetchAll();
            return $chats;
        } else {
            $chats = [];
            return $chats;
        }
                    
    }

    function getUserLastMessage($from_id, $to_id, $conn) {
        $lastChatSql = 'SELECT * FROM `message` 
                            WHERE (from_id = ? AND to_id = ?) 
                            OR  (to_id = ? AND from_id = ? ) ORDER BY message_id DESC LIMIT 1';
        $lastChatStmt = $conn->prepare($lastChatSql);
        $lastChatStmt->execute([$from_id, $to_id , $from_id, $to_id]);
        $lastChat = $lastChatStmt->fetch();
        $lastMessage = $lastChat['message'];
        return $lastMessage;
    } 
?>