<?php include "conexao.php";

$nome = $_POST["nomes"];
$tipo = $_POST["tipo"];
$telefone = $_POST["telefones"];
$rua = $_POST["Rua"];
$numero = $_POST["Numero"];
$bairro = $_POST["Bairro"];
$cep = $_POST["cep"];
$data = date('Y-m-d');


$sql = mysqli_query($con, "INSERT INTO agenda_telefonica (nome,tipo,telefone,data) VALUES ('$nome', '$tipo', '$telefone','$data')");
$id_inserted = $con->insert_id;

$sql_insert = mysqli_query($con, "INSERT INTO endereco (id_pessoa, rua, numero, bairro, cep) VALUES ('$id_inserted', '$rua', '$numero','$bairro', '$cep')");

header("Location:pagina.php");
exit;

?>

