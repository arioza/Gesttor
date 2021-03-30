<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Gesttor - Novo Cliente</title>
    <?php include('head.php'); ?>
</head>

<body>
<?php include('header.php'); ?>

<div class="container">
    <h2 style="text-align: center; margin-top: 20px">Editar Ordem de Serviço</h2>

    <form action="_cadastraUsuario.php" method="POST">
        <div class="row">
            <div class="col-md-6">
                <label>Equipamento</label>
                <input name="equipment" type="text" class="form-control" autofocus required>
                <label>Cliente</label>
                <input name="client" type="phone" class="form-control" required readonly="true">
                <div class="row">
                    <div class="col-md-6">
                        <label>Modelo</label>
                        <input name="model" type="phone" class="form-control" required readonly="true">
                    </div>
                    <div class="col-md-6">
                        <label>Marca</label>
                        <input name="brand" type="phone" class="form-control" required readonly="true">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label>Detalhes e observações do equipamento:</label>
                <textarea name="note" type="text" class="form-control" rows="3" maxlength="200"></textarea>
                <label>Descrição do defeito:</label>
                <textarea name="note" type="text" class="form-control" rows="3" maxlength="200"></textarea>
            </div>
        </div>
        <div class="row">
            <label>Serviço realizado:</label>
            <textarea name="note" type="text" class="form-control" rows="3" maxlength="200"></textarea>
        </div>

        <div class="row">
            <div class="col-md-2 offset-md-5">
                <button type="submit" class="btn btn-success" style="width: 155px; margin-top: 20px">Salvar</button>
            </div>
        </div>
    </form>
</div>

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

<?php include('footer.php');?>

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