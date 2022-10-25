<?php include "head.php"; ?>

<div class="container">
    <h1>Adicionar Usuário</h1>
    
    <form action="adicionar_action.php" method="post">
        <div class="mb-3">
            <label for="" class="form-label">
                Nome: <br/>
                <input type="text" name="name" class="form-control">
            </label>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">
                E-mail: <br/>
                <input type="email" name="email" class="form-control">
            </label>
        </div>
        
        <input type="submit" value="Adicionar" class="btn btn-primary"/>
    </form>
</div>

<?php include "footer.php"; ?>