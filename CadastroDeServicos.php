<?php
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Gesttor - Novo Serviço</title>
    <?php include('head.php'); ?>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
</head>

<body>
<?php include('header.php'); ?>

<div class="container">
    <h2 style="text-align: center; margin-top: 20px">Novo Serviço</h2>

    <form action="_cadastraServico.php" method="POST">
        <div class="row">
            <div class="col-md-6">
                <label>Serviço</label>
                <input type="text" name="servico" class="form-control" autofocus required/>
            </div>
            <div class="col-md-6">
                <label>Valor</label>
                <input type="number" name="valor" class="form-control" required/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 offset-md-5">
                <button type="submit" class="btn btn-success" style="width: 155px; margin-top: 20px"><i
                            class="fas fa-plus"></i> Cadastrar
                </button>
            </div>
        </div>
    </form>

</div>


<?php include('footer.php');?>


</body>
</html>