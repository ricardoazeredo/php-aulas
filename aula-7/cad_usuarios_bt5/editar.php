<?php
    require 'config.php';
    require 'head.php';
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
<div class="container">
    <h1>Editar Usuário</h1>
    
    <form action="Editar_action.php" method="post">
        <input type="hidden" name="id" value="<?=$info['id'];?>" />
        <div class="mb-3">
            <label for="" class="form-label">
                Nome: <br/>
                <input type="text" name="name" value="<?=$info['nome'];?>" class="form-control" />
            </label>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">
                E-mail: <br/>
                <input type="email" name="email" value="<?=$info['email'];?>" class="form-control"/>
            </label>
        </div>
        
        <input type="submit" value="Salvar" class="btn btn-primary" />
    </form>

</div>

<?php include 'footer.php'; ?>