<?php
include('_conexao.php');

$consulta = "SELECT * FROM clients order by idclients desc limit 10";
$con = $conexao->query($consulta) or die($conexao->error);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Gesttor - Novo Equipamento</title>
    <?php include('head.php'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script>
        function getIdClient(cont) {
            document.getElementById('idclient').value = document.getElementById('getId'+cont).innerText;
            document.getElementById('name').value = document.getElementById('getName'+cont).innerText;
        }
        
        function findClient(nome) {
            alert(document.getElementById('findName').innerText);
            //var sql = "select * from clients where nome like" + nome;
        }
    </script>
</head>

<body>
<?php include('header.php'); ?>

<div class="container">
    <h2 style="text-align: center; margin-top: 20px">Novo Equipamento</h2>

    <form action="_cadastraEquipamento.php" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        <label>ID</label>
                        <input class="form-control" name="idclient" id="idclient" readonly required/>
                    </div>
                    <div class="col-md-10">
                        <label>Cliente</label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" name="name" id="name" required readonly/>
                            <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#ExemploModalCentralizado"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <label>Categoria</label>
                <select style="width: 100%" name="category" class="form-control" required>
                    <option value="Computador">Computador</option>
                    <option value="Notebook">Notebook</option>
                    <option value="Celular">Celular</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Outros">Outros</option>
                </select>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label>Modelo</label>
                        <input name="model" type="text" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Número de Série</label>
                        <input name="serialnumber" type="text" class="form-control" required>
                    </div>
                </div>
                <label style="margin-top: 15px">Marca</label>
                <input name="brand" type="text" class="form-control" required>
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

<!-- Modal -->
<div class="modal fade modal-xl" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="TituloModalCentralizado">CLIENTES</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                <input class="form-control" type="text" id="findName" placeholder="Digite aqui..."/>
                <button onclick=findClient(); class="btn btn-outline-primary" type="button" ><i class="fas fa-search"></i> Pesquisar</button>
                </div>
                <table width="100%">
                    <tr align="middle" style="border-bottom:2px grey solid; font-weight: bold">
                        <td>ID</td>
                        <td>Nome</td>
                        <td></td>
                    </tr>
                    <?php
                    $cont = 0;
                    while($dado = $con->fetch_array()) {
                        $cont = $cont+1
                        ;?>
                        <div class="row">
                            <tr style="border-bottom: 1px grey dashed;">
                                <td style=" text-align: center">
                                    <label id ="getId<?php echo $cont ?>"><?php echo $dado['idclients']?></label>
                                </td>
                                <td>
                                    <label id="getName<?php echo $cont ?>"><?php echo $dado['name']; ?></label>
                                </td>
                                <td style="text-align: right">
                                    <button onclick=getIdClient(<?php echo $cont ?>); data-dismiss="modal" type="button" class="btn btn-outline-success">Selecionar</button>
                                </td>
                            </tr>
                        </div>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>

</body>
</html>