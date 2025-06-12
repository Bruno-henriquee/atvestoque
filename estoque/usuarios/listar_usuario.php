<?php
header('Content-Type: application/json');

$conn = new mysqli ("localhost","root","","panificadora");

if($conn->connect_error) {
    die(json_encode(["erro" => "Erro ao conectar"]));
}

$sql = "SELECT nome, funcao, matricula FROM usuarios";
$resultado = $conn -> query($sql);

$usuarios = [];

while($linha = $resultado -> fetch_assoc()){
    $usuarios[] = $linha;
}

echo json_encode($usuarios);
?>