<?php
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $conn = new mysqli ("localhost","root","","panificadora");

    if($conn->connect_error) {
        die(json_encode(["erro" => "Erro ao conectar"]));
    }
    
    $nome = ($_POST['nome']);
    $funcao = ($_POST['funcao']);
    $matricula = (int) $_POST['matricula'];

    $sql = "INSERT INTO usuarios (nome, funcao, matricula) VALUES('$nome', '$funcao', '$matricula')";
    if($conn -> query($sql)){
        echo json_encode(["sucesso" =>true,"mensagem" =>"Produto inserido com sucesso!"]);
    } else {
        echo json_encode(["erro" => "Erro ao inserir produto."]);
    }
    $conn->close();
} else {
    echo json_encode(["erro" => "Requisição inválida."]);
}
?>