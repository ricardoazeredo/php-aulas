<?php
    require 'config.php';

    /**
     * Cria uma lista vazia para receber os dados da consulta da tabela tbl_usuarios.
     * Depois, verifica se tem dados na cosnulta(se quantidade de linhas é maior que 0 (zero)).
     * Caso tenha, add no array lista.
     * fecthAll - pega todos os dados. 
     * PDO::FECTH_ASSOC - Cosntante estática do PDO que associa os dados. Tira duplicidades do array.
     */

    $lista = [];
    $sql = $pdo->query("SELECT * FROM tbl_usuarios");

    if($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
        //print_r($lista);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuário</title>
</head>
<body>
    <div>
        <a href="adicionar.php">adicionar usuário</a>
    </div>
    <div>
        <table border="1" width="100%">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            <?php foreach($lista as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['id']; ?></td>
                    <td><?=$usuario['nome']; ?></td>
                    <td><?=$usuario['email']; ?></td>
                    <td>
                        <a href="editar.php?id=<?=$usuario['id']; ?>">editar</a>
                        <a
                         href="excluir.php?id=<?=$usuario['id']; ?>"
                         onclick="return confirm('Tem certeza que deseja excluir?')"
                        >
                        excluir
                    </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>