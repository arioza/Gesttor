<?php
include('_conexao.php');

$consulta = "SELECT * FROM services where idservices = $_GET[idservice]";
$con = $conexao->query($consulta) or die($conexao->error);
while($exibe = mysqli_fetch_assoc($con)){
    $idservico = $exibe['idservices'];
    $servico = $exibe['name'];
    $valor = $exibe['price'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Gesttor - Atualiza Serviço</title>
    <?php include('head.php'); ?>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
</head>

<body>
<?php include('header.php'); ?>

<div class="container">
    <h2 style="text-align: center; margin-top: 20px">Atualiza Serviço</h2>

    <form action="_atualizaServico.php" method="POST">
        <div class="row">
            <div class="col-md-2">
                <label>ID Serviço: </label>
                <input type="text" name="idservico" value="<?php echo $idservico ?>" class="form-control" readonly/>
            </div>
            <div class="col-md-6">
                <label>Serviço</label>
                <input type="text" name="servico" value="<?php echo $servico ?>" class="form-control" autofocus required/>
            </div>
            <div class="col-md-4">
                <label>Valor</label>
                <input type="number" name="valor" value="<?php echo $valor ?>" class="form-control" required/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 offset-md-5">
                <button type="submit" class="btn btn-success" style="width: 155px; margin-top: 20px"><i
                            class="fas fa-plus"></i> Atualizar
                </button>
            </div>
        </div>
    </form>

</div>


<?php include('footer.php');?>


</body>
</html>