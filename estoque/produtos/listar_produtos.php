<?php
header('Content-Type: application/json');

//Conectar o banco 
$conn = new mysqli ("localhost","root","","panificadora");

if($conn->connect_error) {
    die(json_encode(["erro" => "Erro ao conectar"]));
}

//Cosulta SQL
$sql = "SELECT id, nome, quantidade, preco FROM produtos";
$resultado = $conn -> query($sql);

$produtos = [];

while($linha = $resultado -> fetch_assoc()){
    $produtos[] = $linha;
}

echo json_encode($produtos);
?>