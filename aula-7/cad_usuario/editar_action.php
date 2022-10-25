<?php
    require 'config.php';

    /**
     * Recebe os dados do form editar.
     *     
     */
    $id = filter_input(INPUT_POST, 'id');
    $name = filter_input(INPUT_POST, 'name'); 
    $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL); 

    //verificar se o id, o nome e o email são válidos
    if($id && $name && $email) {

        $sql = $pdo->prepare("UPDATE tbl_usuarios SET nome =:name, email = :email WHERE id = :id");
        $sql->bindValue(':name',$name); 
        $sql->bindValue(':email',$email); 
        $sql->bindValue(':id',$id); 
        $sql->execute();

        header("Location:index.php");
        exit;

    } else {
        //caso contrário, vai retorna para página adicionar.php e não registra.
        header('Location: adicionar.php'); 
        exit;
    }