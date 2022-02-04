<?php

    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

    $error = '';

    if(strlen($login) <= 3){
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

    $sql = "SELECT `id` FROM `user` WHERE `login` = :login && `password` = :password";
    $query = $pdo->prepare($sql);
    $query->execute(['login' => $login, 'password'=>$pass]);

    $user = $query->fetch(PDO::FETCH_OBJ);

    if($query->rowCount() == 0){
        echo "Такого пользователя не существует";
    }else{
        setcookie('login', $login, time()+3600*24*30, '/');
        echo 'Готово';
    }
?>