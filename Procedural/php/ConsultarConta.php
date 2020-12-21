<?php
require_once 'db_connect.php';

if(isset($_POST['btn-selecionar'])):
    $login = mysqli_escape_string($connect,$_POST['login']);
    $senha = mysqli_escape_string($connect,$_POST['senha']);
    if (empty($login) or empty($senha)):
        header('location: index.php');
    else:
        if($login == 'admin' && $senha == '1234'):
            header('location: Select.php');
        else:
            header('location: index.php');
        endif;
    endif;
endif;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/consulta.css">
    <title>Contas ativas</title>
</head>
<body>
    <form class="tela" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h1>Privado</h1>
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="senha" placeholder="Senha">
        <button type="submit" name="btn-selecionar">Entrar</button>
        <a href="index.php">Voltar</a>
    </form>
</body>
</html>