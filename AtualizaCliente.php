<?php
include('_conexao.php');

$consulta = "SELECT * FROM clients where idclients = $_GET[idclient]";
$con = $conexao->query($consulta) or die($conexao->error);
while($exibe = mysqli_fetch_assoc($con)){
    $idclient= $exibe['idclients'];
    $nome = $exibe['name'];
    $cpf = $exibe['cpf'];
    $celular = $exibe['phone'];
    $telefone = $exibe['telephone'];
    $email = $exibe['email'];
    $cep = $exibe['cep'];
    $cidade = $exibe['city'];
    $estado = $exibe['state'];
    $rua = $exibe['street'];
    $bairro = $exibe['district'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Gesttor - Novo Cliente</title>
    <?php include('head.php'); ?>
    <style type="text/css">
        .toggleSenha {
            border-color: red !important;
        }
    </style>
    <script type="text/javascript">

        function limpa_formulário_cep() {
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {

                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);
                document.getElementById('rua').value = (conteudo.logradouro + ", Nº ");
                document.getElementById('bairro').value = (conteudo.bairro);
            } else {
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            var cep = valor.replace(/\D/g, '');

            if (cep != "") {

                var validacep = /^[0-9]{8}$/;

                if (validacep.test(cep)) {

                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";
                    document.getElementById('rua').value = "...";
                    document.getElementById('bairro').value = "...";

                    var script = document.createElement('script');

                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    document.body.appendChild(script);

                } else {

                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } else {
                limpa_formulário_cep();
            }
        };
    </script>


</head>

<body>
<?php include('header.php'); ?>
<div class="container">
    <h2 style="text-align: center; margin-top: 20px">Editando Cliente</h2>
    <form action="_atualizaCliente.php" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        <label>ID</label>
                        <input name="idclient" type="text" value="<?php echo $idclient?>" class="form-control">
                    </div>
                    <div class="col-md-10">
                        <label>Nome</label>
                        <input name="nome" type="text" value="<?php echo $nome?>" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>CPF</label>
                        <input name="cpf" type="id" value="<?php echo  $cpf?>" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Telefone</label>
                        <input name="telefone" type="phone" value="<?php echo  $telefone?>" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Celular</label>
                        <input name="celular" type="phone" value="<?php echo  $celular?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>E-mail</label>
                        <input name="email" type="email" value="<?php echo  $email?>" class="form-control" required>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>CEP</label>
                        <div>
                            <input name="cep" class="form-control" type="text" id="cep" value="<?php echo $cep?>"  maxlength="9"
                                   onblur="pesquisacep(this.value);">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Cidade</label>
                        <div>
                            <input name="cidade" value="<?php echo  $cidade?>" class="form-control" type="text" id="cidade">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label>Estado</label>
                        <div>
                            <input name="estado" value="<?php echo  $estado?>" class="form-control" type="text" id="uf">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Rua</label>
                        <input name="rua" type="text" value="<?php echo  $rua?>" class="form-control" id="rua" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Bairro</label>
                        <input name="bairro" type="text" value="<?php echo  $bairro?>" class="form-control" id="bairro" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 offset-md-5">
                <button type="submit" class="btn btn-success" style="width: 155px; margin-top: 20px"><i class="fas fa-sync-alt"></i> Atualizar
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