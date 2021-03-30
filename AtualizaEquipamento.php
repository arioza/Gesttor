<?php
include('_conexao.php');

$consulta = "SELECT * FROM equipments where idequipments = $_GET[idequipment]";
$con = $conexao->query($consulta) or die($conexao->error);
while($exibe = mysqli_fetch_assoc($con)){
    $idequipamento= $exibe['idequipments'];
    $marca = $exibe['brand'];
    $modelo = $exibe['model'];
    $serial = $exibe['serialnumber'];
    $dataRegistro = $exibe['registrationDate'];
    $categoria = $exibe['category'];
    $cliente = $exibe['clients_idclients'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Gesttor - Editando Cliente</title>
    <?php include('head.php'); ?>
</head>

<body>
<?php include('header.php'); ?>

<div class="container">
    <h2 style="text-align: center; margin-top: 20px">Atualizando Equipamento</h2>

    <form action="_atualizaEquipamento.php" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                <div class="col-md-2">
                    <label>ID</label>
                    <input name="idequipment" type="text" value="<?php echo $idequipamento?>" class="form-control">
                </div>
                <div class="col-md-10">
                    <label>Cliente</label>
                    <input name="idclient" value="<?php echo $cliente ?>" type="text" class="form-control" autofocus required>
                </div>
                </div>
                <label>Categoria</label>
                <select style="width: 100%" name="category" value="<?php echo $categoria?>" class="form-control" required>
                <?php if($categoria == 'Computador'){
                    echo'
                    <option selected value="Computador">Computador</option>
                    <option value="Notebook">Notebook</option>
                    <option value="Celular">Celular</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Outros">Outros</option>';
                    }
                else if($categoria == 'Notebook'){
                    echo'
                    <option value="Computador">Computador</option>
                    <option selected value="Notebook">Notebook</option>
                    <option value="Celular">Celular</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Outros">Outros</option>';
                }
                else if($categoria == 'Celular'){
                    echo'
                    <option value="Computador">Computador</option>
                    <option value="Notebook">Notebook</option>
                    <option selected value="Celular">Celular</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Outros">Outros</option>';
                }
                else if($categoria == 'Tablet'){
                    echo'
                    <option value="Computador">Computador</option>
                    <option value="Notebook">Notebook</option>
                    <option value="Celular">Celular</option>
                    <option selected value="Tablet">Tablet</option>
                    <option value="Outros">Outros</option>';
                }
                else if($categoria == 'Outros'){
                    echo'
                    <option selected value="Computador">Computador</option>
                    <option value="Notebook">Notebook</option>
                    <option value="Celular">Celular</option>
                    <option value="Tablet">Tablet</option>
                    <option selected value="Outros">Outros</option>';
                }

                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label>Modelo</label>
                        <input name="model" type="text" value="<?php echo $modelo?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Número de Série</label>
                        <input name="serialnumber" type="text" value="<?php echo $serial?>" class="form-control" required>
                    </div>
                </div>
                <label>Marca</label>
                <input name="brand" type="text" value="<?php echo $marca?>" class="form-control" required>
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