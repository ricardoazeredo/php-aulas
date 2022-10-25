<?php
    require 'config.php';
   
    //Pega o id da url devido ao metodo GET.
    $id = filter_input(INPUT_GET,'id');

    //Verifica se tem id.
    if($id) {
        $sql = $pdo->prepare("DELETE FROM tbl_usuarios  WHERE id = :id ");
        $sql->bindValue(':id', $id);
        $sql->execute();
    } 
    header("Location: index.php");
    exit;

?>
