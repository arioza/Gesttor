<?php
session_start();
include('_conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Gesttor - Home</title>
    <?php include('head.php');?>
</head>
<body>
<?php include('header.php');?>

<div class="row" style="margin-top: 20px">
    <div class="col-md-3" style="border-right: solid 1px #DEE1E6;">
        <h2 style="text-align: center">Atalhos</h2>
        <div class="row">
            <a href="CadastroCliente.php"><i class="fas fa-user-plus"></i> Novo Cliente</a>
        </div>
        <div class="row">
            <a href="CadastroEquipamento.php"><i class="fas fa-laptop-medical"></i> Novo Equipamento</a>
        </div>
        <div class="row">
            <a href="CadastroOS.php"><i class="fas fa-clipboard"></i> Nova O.S.</a>
        </div>

    </div>
    <div class="col-md-6">

    </div>
    <div class="col-md-3" style="border-left: solid 1px #DEE1E6;">

    </div>
</div>


<?php include('footer.php');?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>