<?php include "conexao.php" ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Nova</title> 
</head>
<body>
<h1>Sejam Bem vindos</h1>
<input type='text' name=Dados disabled value="Agenda" >
<br>
<br>

<form action="script.php" method="post">
Nome: <input type=text name=nomes placeholder="Digite aqui" required><br> 
<br>
<label for="tipo">Qual o seu vinculo com esta pessoa:</label>

<select name="tipo" id="tipo" required>
  <option value="" selected>Selecione</option>

  <?php
    $sql_tipo = "select * from tipo order by tipo ASC";
    $res1 = mysqli_query($con, $sql_tipo);
    while ($vetor=mysqli_fetch_array($res1)){
  ?>
  <option value="<?php echo $vetor['id_tipo']; ?>"><?php echo $vetor['tipo'] ?></option>
  <?php } ?>
      
</select><br>
 
<br>
Telefone: <input type=text name=telefones placeholder="Digite aqui" required><br>
<br>
Rua: <input type=text name=Rua placeholder="Digite aqui"required><br>
<br>
Numero: <input type=text name=Numero placeholder="Digite aqui"required><br>
<br>
bairro: <input type=text name=Bairro placeholder="Digite aqui"required><br>
<br>
cep: <input type=text name=cep placeholder="Digite aqui"required><br>
<br>

<input type=submit value="Adicionar">
</form>


</body>
</html>

