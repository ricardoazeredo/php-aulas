<?php
    require 'config.php';
    //Criando o array para add as informções
    $info =[];

    //Pega o id da url devido ao metodo GET.
    $id = filter_input(INPUT_GET,'id');

    //Verifica se tem id.
    if($id) {
        $sql = $pdo->prepare("SELECT * FROM tbl_usuarios Where id = :id");   
        $sql->bindValue(':id',$id);
        $sql->execute();
        
        //Verifica se id é válido.
        if($sql->rowCount() > 0 ) {
            //o método fecth vai pegar o primeiro resultado.
            $info = $sql->fetch(PDO::FETCH_ASSOC);

        } else {
            header("Location: index.php");
            exit;
        }

    } else {
        header("Location: index.php");
        exit;
    }

?>

<h1>Editar Usuário</h1>

<form action="Editar_action.php" method="post">
    <input type="hidden" name="id" value="<?=$info['id'];?>" />
    <label for="">
        Nome: <br/>
        <input type="text" name="name" value="<?=$info['nome'];?>" />
    </label><br/><br/>

    <label for="">
        E-mail: <br/>
        <input type="email" name="email" value="<?=$info['email'];?>" />
    </label><br/><br/>
    
    <input type="submit" value="Salvar" />
</form>