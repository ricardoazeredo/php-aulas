<?php
    require 'config.php';
    include 'head.php';

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

<body>
    <div class="container">
        <div>
            <h1>Cadastro de Usuários com C.R.U.D.</h1>
        </div>
        <div>
        <a class="btn btn-primary" href="adicionar.php">adicionar usuário</a>
    </div>
        <table class="table">
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
                        <a
                         href="editar.php?id=<?=$usuario['id']; ?>"
                         class="btn btn-success"
                        >
                            editar
                        </a>
                        <a
                         href="excluir.php?id=<?=$usuario['id']; ?>"
                         onclick="return confirm('Tem certeza que deseja excluir?')"
                         class="btn btn-danger"
                        >
                        excluir
                    </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php include 'footer.php'; ?>