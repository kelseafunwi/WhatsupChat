<?php
    $host = "127.0.0.1";
    $dbName = 'whatsupchat';
    $username = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$dbName";
    
    try {
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "The connection failed: " . $e->getMessage();
    }
?>