<?php
//Conexão
require_once 'db_connect.php';

if(isset($_GET['id'])):
    $id = mysqli_escape_string($connect,$_GET['id']);

    $sql = "SELECT * FROM usuario WHERE id='$id'";
    $resultado = mysqli_query($connect,$sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/atualizar.css">
    <title>Atualizar</title>
</head>
<body>
    <form class="atualiza" action="Update.php" method="POST">
        <h1>Atualizar usuário</h1>
        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
        <input type="text" name="nome" placeholder="Seu nome" value="<?php echo $dados['nome']; ?>">
        <input type="text" name="Clogin" placeholder="Seu nome de Login" value="<?php echo $dados['login']; ?>">
        <input type="email" name="email" placeholder="Seu E-mail" value="<?php echo $dados['email']; ?>">
        <input type="number" name="idade" placeholder="Sua idade" value="<?php echo $dados['idade']; ?>">
        <input type="password" name="Csenha" placeholder="Insira a senha novamente">
        <button type="submit" name="btn-atualiza">Atualizar</button>
        <a class="main-btn" href="home.php">Voltar</a>
    </form>
</body>
</html>