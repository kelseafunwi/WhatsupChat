<?php
    
    function opened($from_id, $chats,  $conn) {
        $opened = 1;
        foreach ($chats as $chat) {
            if ($chat['opened'] == 0) {
                $chat_id = $chat['message_id'];
                $updateOpenedSql = "UPDATE `message`  SET opened =  ?  WHERE from_id = ? AND message_id = ?";
                $updateStmt = $conn->prepare($updateOpenedSql);
                $updateStmt->execute([$opened, $from_id ,$chat_id]);
            }
        }
    }
?>