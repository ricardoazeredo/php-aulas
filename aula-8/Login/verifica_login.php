<?php
    require 'config.php';
    $user_login = [];
    $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL); 
    $password = filter_input(INPUT_POST,'password'); 

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = $pdo->query("SELECT * FROM tbl_login WHERE email = :email and senha = ''");
    // $sql->bindValue(':email', $email);
    // $sql->bindValue(':password', $password);
    // $sql-> execute();

    
        $user_login = $sql->fetch(PDO::FETCH_ASSOC);
        $senha_hash = $user_login['senha'];

        if(password_verify($password, $senha_hash)){
            header('Location: Home.php');
            exit;
        } else {
            header("Location: index.php");
            exit;
        }

    