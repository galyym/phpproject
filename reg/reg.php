<?php

    $name = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));


    $error = '';

    if(strlen($name) <= 3){
        $error = 'Введите имя';
    }
    else if(strlen($email) <= 3){
        $error = 'Введите email';
    }
    else if(strlen($login) <= 3){
        $error = 'Введите логин';
    }
    else if(strlen($pass) <= 3){
        $error = 'Введите пароль';
    }

    if($error != ''){
        echo $error;
        exit();
    }

    $hash = "sh56f529s8f4fsdf65sfg65";
    $pass = md5($pass . $hash);

    $user = "root";
    $password = "";
    $host = "localhost";
    $db = "users";

    $dsn = "mysql:host=" . $host . ";dbname=" . $db;
    $pdo = new PDO($dsn, $user, $password);

    $sql = "INSERT INTO user(name, email, login, password) VALUES(?,?,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute([$name, $email, $login, $pass]);
    
    echo 'Готово';
?>