<?php include "conexao.php" ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <h1>Tabela de Dados</h1>
    <a href="index_agenda.php"><button class="btn btn-ionc-4">CADASTRAR NOVO CLIENTE</button></a>
    <br>
    <br>
    <table border=1>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Rua</th>
                <th>Bairro</th>
                <th>Numero</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php 
        $sql = $conn->query("SELECT a.id, a.nome, a.telefone, b.rua, b.Bairro, b.numero, c.tipo
        FROM agenda_telefonica a
        INNER JOIN endereco b
        ON a.id=b.id_pessoa 
        INNER JOIN tipo c 
        ON a.tipo= c.id_tipo");
        $sql->execute();
        $contatos = $sql->fetchAll();

       foreach($contatos as $contato){
      ?>
         <tr>
            <td><?php echo $contato['nome']; ?></td>
            <td><?php echo $contato['telefone']; ?></td>
            <td><?php echo $contato['rua']; ?></td>
            <td><?php echo $contato['Bairro']; ?></td>
            <td><?php echo $contato['numero']; ?></td>                    
            <td><?php echo $contato['tipo']; ?></td>
                <td>
                    <a href="editar.php?id=<?=$contato['id'];?>">[ Editar ]</a>
                    <a href="excluir.php?id=<?=$contato['id'];?>"onclick="return confirm('Deseja realmente excluir?')">[ Excluir ]</a>
                </td>

        </tr>

            <?php } ?>
        </tbody>
    </table></body>
</html>

<?php

?>