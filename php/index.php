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
            $senha = md5($senha);
            $sql = "SELECT * FROM usuario WHERE login = '$login' and senha = '$senha'";
            $resultado = mysqli_query($connect,$sql);

            if(mysqli_num_rows($resultado)):
                $dados = mysqli_fetch_array($resultado);
                mysqli_close($connect);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];
                header('location: home.php');
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
    <link rel="stylesheet" href="../css/style.css">
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
    
    
    <form class="caixa" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h1>Login</h1>
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="senha" placeholder="Senha">
        <button type="submit" name="btn">Entrar</button>
        <a href="../html/CriarConta.html"><button type="button" id="criar">Criar conta</button></a> 
        <h5>Obs: Ler o db_connect.php!!!</h5>
    </form>
        
    
</body>
</html>