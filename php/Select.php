<?php
require_once 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/selecionar.css">
    <title>Contas ativas</title>
</head>
<body>
    
        <h3>Usuários</h3>
        <a href="index.php">Sair</a>
        <table>
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Login:</th>
                    <th>Email:</th>
                    <th>Idade:</th>
                    <th>Senha:</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM usuario";
                    $resultado = mysqli_query($connect,$sql);
                    while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['nome']; ?></td>
                    <td><?php echo $dados['login']; ?></td>
                    <td><?php echo $dados['email']; ?></td>
                    <td><?php echo $dados['idade']; ?></td>
                    <td><?php echo $dados['senha']; ?></td>
                </tr>
                <?php
                    endwhile;
                ?>
            </tbody>
        </table>

</body>
</html>