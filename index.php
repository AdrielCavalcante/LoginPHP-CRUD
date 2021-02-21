<?php
// Conexão de arquivos
require_once 'db_connect.php';
//sessão
session_start();
if(isset($_SESSION['mensagem'])):
    echo "<h6>".$_SESSION['mensagem']."</h6>";
endif;
session_unset();
// Botão enviar
if(isset($_POST['btn'])):
    $erros = array();
    $login = mysqli_escape_string($connect,$_POST['login']);
    $senha = mysqli_escape_string($connect,$_POST['senha']);
    if (empty($login) or empty($senha)):
        $erros[] = "<li>O Campo login e senha precisam estar preenchidos!</li>"; 
    else:
        $sql = "SELECT login FROM usuario WHERE login = '$login'";
        $resultado = mysqli_query($connect,$sql);

        if(mysqli_num_rows($resultado)):
            $sql = "SELECT senha FROM usuario WHERE login = '$login'";
            $resultado = mysqli_query($connect,$sql);  
            $senhaSegura = mysqli_fetch_array($resultado);
            if(password_verify($senha,$senhaSegura['senha'])):
                $sql = "SELECT * FROM usuario WHERE login='$login'";
                $resultado = mysqli_query($connect,$sql);
                $dados = mysqli_fetch_array($resultado);
                mysqli_close($connect);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];
                header('location: Procedural/php/home.php');
            else: 
                $erros[] = "<li>Usuários e senhas não conferem!</li>";
            endif;
        else:
            $erros[] = "<li>Usuário inexistente!</li>";
        endif;
    endif;
    
endif;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilos -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">

    <title>Login</title>
</head>
<body>
    
    <?php
        if(!empty($erros)):
            foreach($erros as $erro):
                echo $erro;
            endforeach;
        endif;
    ?>
    
    
    <form class="caixa" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h1>Login</h1>
        <input class="form-control" type="text" name="login" placeholder="Login">
        <input class="form-control" type="password" name="senha" placeholder="Senha">
        <button type="submit" name="btn">Entrar</button>
        <a href="Procedural/php/CriarConta.php" class="main-btn" id="criar">Criar conta</a>
        <a href="Procedural/php/ConsultarConta.php" class="main-btn" id="gerenciar">Gerenciar contas</a> 
    </form> 
</body>
</html>