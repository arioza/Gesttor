<?php
include('_conexao.php');

$consulta = "SELECT * FROM services";
$con = $conexao->query($consulta) or die($conexao->error);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Gesttor - Serviços</title>
    <?php include('head.php');?>
</head>
<body>
<?php include('header.php'); ?>

<div class="row" style="margin-top: 20px">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
        <h2 style="text-align: center">Serviços</h2>
    </div>
    <div class="col-md-2">
        <a type="button" class="btn btn-outline-success" href="CadastroDeServicos.php"><i
                    class="fas fa-laptop-medical"></i> Novo Serviço</a>
    </div>
</div>

<table width="100%">
    <tr align="middle" style="border-bottom:2px grey solid; font-weight: bold">
        <td>SERVIÇO</td>
        <td>VALOR</td>
        <td></td>
        <td></td>
    </tr>
    <?php while($dado = $con->fetch_array()) {?>
        <div class="row">
            <tr style="border-bottom: 1px grey dashed;">
                <td><?php echo $dado['name']; ?></td>
                <td>R$ <?php echo number_format($dado['price'], '2', ',', '.'); ?></td>

                <td align="middle">
                    <a href="AtualizaServico.php?idservice=<?php echo $dado['idservices']; ?>"><i class="fas fa-user-edit"></i> Editar </a>
                </td>
                <td align="middle">
                    <a href="_deletaServico.php?idservice=<?php echo $dado['idservices']; ?>"><i class="fas fa-user-times"></i> Excluir</a>
                </td>

            </tr>
        </div>
    <?php }?>
</table>

<!--Inicio Modal Sair -->
<div class="modal fade" id="sair" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Deseja realmente sair?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary"><a href="logout.php" style="color: white">Sair</a>
                </button>
            </div>
        </div>
    </div>
</div>
<!--Fim Modal-->

<?php include('footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>