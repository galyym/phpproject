<?php
    $user = "root";
    $password = "";
    $host = "localhost";
    $db = "users";

    $dsn = "mysql:host=" . $host . ";dbname=" . $db;
    $pdo = new PDO($dsn, $user, $password);
?>