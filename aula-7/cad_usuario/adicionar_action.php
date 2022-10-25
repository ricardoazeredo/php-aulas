<?php
    require 'config.php';

    /**
     * a função filter_input serve para pegar dados pelo nome de uma variável externa ou por filtros de opções.
     * input_post porque o método do formulário é post
     * FILTER_VALIDATE_EMAIL é uma filtro de validação de email.
     *     
     */
    $name = filter_input(INPUT_POST, 'name'); 
    $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL); 

    //verificar se o nome e o email são válidos
    if($name && $email) {

        //poderia, mas é vulnerável
        //$pdo->query("INSERT INTO usuarios(nome, email) VALUES ('$name','$email')");

        /** Refatorando o código
         * Verificando se tem o email cadastrado. Para que não haja 2 emails iguais.
         */

         $sql = $pdo->prepare("select * from tbl_usuarios where email = :email");
         $sql->bindValue(':email', $email);
         $sql->execute();

         if($sql->rowCount() === 0){
            /**
             * o método prepate do PDOStatement é uma forma mais segura de receber dados para 
             * serem inseridos ou atualizados no Banco de dados. Ele trata a declaração para ser executada
             * e retorna um objeto.
             * bindValue recebe o valor da variável e associa com o :name. Não altera o valor quando
             * bindParam associa a variável.
             * execute vai executar a query.
             * Location redireciona para página desejada. Caso volte para a index, significa que a 
             * execução teve sucesso.
             */

            $sql = $pdo->prepare( "INSERT INTO tbl_usuarios (nome,email) VALUES (:name, :email)" );//template
            $sql->bindValue(':name', $name); 
            $sql->bindParam(':email', $email); //Passa a variável como parâmetro. Caso a a variável seja alterada depois, o parâmetro também mudará  
            $sql->execute();

            header("Location: index.php");
            exit;
         } else {
            header("Location: adicionar.php");
            exit;
         }       

    } else {
        //caso contrário, vai retorna para página adicionar.php e não registra.
        header('Location: adicionar.php'); 
        exit;
    }