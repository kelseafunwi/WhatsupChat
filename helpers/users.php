<?php 

    // returning all the users from the database with a particular username
    function getUserFromid($id, $conn) {
        $sql = 'SELECT * FROM users WHERE user_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch();
            return $user;
        } else {
            $user = [];
            return $user;
        }
     
    }


    // This my helper function will take the connection the database, query it and return all of the user records which are in the database.
    function getAllUsers($conn) {
        $sql = "SELECT * FROM users";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
            $users = $stmt->fetchAll();
            return $users;
        } else {
            $users = [];
            return $users;
        }
    }
?>