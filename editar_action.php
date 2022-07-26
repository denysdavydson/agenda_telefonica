<?php
require 'conexao.php';

$id = filter_input(INPUT_POST, 'id');
$id_endereco = filter_input(INPUT_POST, "id_endereco");
$name = filter_input(INPUT_POST, 'Nomes');
$tipo = filter_input(INPUT_POST, 'Tipo');
$telefone = filter_input(INPUT_POST, 'Telefones');
$rua = filter_input(INPUT_POST, 'Rua');
$numero = filter_input(INPUT_POST, 'Numero');
$bairro = filter_input(INPUT_POST,'Bairro');
$cep = filter_input(INPUT_POST,'Cep');


if($id && $name) {
    
    $sql = $conn->prepare("UPDATE agenda_telefonica SET nome = :name, tipo = :tipo, telefone = :telefone WHERE id = :id");
    $sql->bindValue(':name', $name);
    $sql->bindValue(':telefone', $telefone);
    $sql->bindValue(':id', $id);
    $sql->bindValue(':tipo', $tipo);  
    $sql->execute();

    $sql = $conn->prepare("UPDATE endereco SET rua = :rua, numero = :numero, bairro = :bairro, cep = :cep WHERE id_endereco = :id_endereco");
    $sql->bindValue(':rua', $rua);
    $sql->bindValue(':numero', $numero);
    $sql->bindValue(':bairro', $bairro);
    $sql->bindValue(':cep', $cep);
    $sql->bindValue(':id_endereco', $id_endereco);
    $sql->execute();


    header("Location: pagina.php");
    exit;
    
} else {
    header("Location: pagina.php");
    exit;
}