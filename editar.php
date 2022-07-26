<?php
require 'conexao.php';

$id = filter_input(INPUT_GET,'id');
$sql=$conn->prepare("SELECT a.nome, a.telefone, a.tipo, b.id_endereco, b.rua, b.numero, b.Bairro, b.cep 
FROM agenda_telefonica a
INNER JOIN endereco b
ON a.id = b.id_pessoa
WHERE a.id = :id;");

$sql->bindValue(':id',$id);
$sql->execute();

$vetor=$sql->fetch();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <h1>Editar Usuario</h1>

    <form action="editar_action.php" method="post">
     <input type="hidden" name="id" value="<?php echo $id ?>">
     <input type="hidden" name="id_endereco" value="<?php echo $id ?>">
Nome: <input type=text name=Nomes placeholder="Digite aqui" value="<?php echo $vetor['nome'] ?>"><br> 

<br>
<label for="tipo">Qual o seu vinculo com esta pessoa:</label>

<select name="Tipo" id="tipo">
  <option value="" selected>Selecione</option>

  <?php
    $sql_tipo = "select * from tipo order by tipo ASC";
    $res1 = mysqli_query($con, $sql_tipo);
    while ($vetor_tipo=mysqli_fetch_array($res1)){
  ?>
  <option value="<?php echo $vetor_tipo['id_tipo']; ?>" <?php if(strcasecmp($vetor_tipo['id_tipo'], $vetor['tipo'])==0){ ?> selected <?php } ?> ><?php echo $vetor_tipo['tipo'] ?></option>
  <?php } ?>
      
</select><br>
 
<br>
Telefone: <input type=text name=Telefones placeholder="Digite aqui" value="<?php echo $vetor['telefone'] ?>"><br>
<br>
Rua: <input type=text name=Rua placeholder="Digite aqui" value="<?php echo $vetor['rua'] ?>"><br>
<br>
Numero: <input type=text name=Numero placeholder="Digite aqui" value=" <?php echo $vetor['numero'] ?>"><br>
<br>
Bairro: <input type=text name=Bairro placeholder="Digite aqui" value=" <?php echo $vetor['Bairro']?>"><br>
<br>
cep: <input type=text name=Cep placeholder="Digite aqui" value="<?php echo $vetor['cep']?>"><br>
<br>

<input type=submit value="Salvar">
</form>
</body>
</html>
<?php
?>

