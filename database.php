<?php

$host = '127.0.0.1'; //This is your host, if you working locally your host will be localhost
$user = 'root'; //The name of the your user in localhost server
$pass = 'gabrielarioza'; //The password of the your user in localhost server
$db_name = 'gesttor'; //The name of the database that you using

$keyword = strval($_POST['query']); //
$search_param = "{$keyword}%";
$conn =new mysqli($host, $user, $pass, $db_name);

$sql = $conn->prepare("SELECT clients.idclients, clients.name FROM clients WHERE clients.name LIKE ?");
$sql->bind_param("s",$search_param);
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $nameResult[] = $row["name"];
    }
    echo json_encode($nameResult);
}
$conn->close();
