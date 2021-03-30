<?php
include_once 'conexao.php';

$assunto = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

//SQL para selecionar os registros
$result_msg_cont = "SELECT idclients, clients.name FROM clients WHERE clients.name LIKE '%".$assunto."%' ORDER BY clients.name ASC LIMIT 10";

//Seleciona os registros
$resultado_msg_cont = $conn->prepare($result_msg_cont);
$resultado_msg_cont->execute();

while($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row_msg_cont['name'] + $row_msg_cont['idclients'];
}

echo json_encode($data);