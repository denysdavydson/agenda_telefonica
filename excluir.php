<?php
require 'conexao.php';

$id = filter_input(INPUT_GET, 'id');
if($id){

      $sql = $conn->prepare("DELETE FROM agenda_telefonica WHERE id = :id");
      $sql->bindValue(':id', $id);
      $sql->execute();
    
      $sql = $conn->prepare("DELETE FROM endereco WHERE id_pessoa = :id_pessoa");
      $sql->bindValue(':id_pessoa', $id);
      $sql->execute();
    }

header("location: pagina.php");
exit;