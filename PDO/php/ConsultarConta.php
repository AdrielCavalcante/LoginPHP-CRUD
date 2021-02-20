<?php
require_once 'Factory/Connect.php';

if(isset($_POST['btn-selecionar'])):
    $login = preg_replace('/[^[:alpha:]_]/', '',$_POST['login']);
    $senha = $_POST['senha'];
    if (empty($login) or empty($senha)):
        header('location: index.php');
    else:
        if($login == 'admin' && $senha == '1234'):
            header('location: Selecionar.php');
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
        <a href="index.php" class="main-btn">Voltar</a>
    </form>
</body>
</html>