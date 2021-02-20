<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/criar.css">
    <title>Adicionar</title>
</head>
<body>
    <form class="adiciona" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h1>Cadastrar usuário</h1>
        <input type="text" name="nome" placeholder="Seu nome">
        <input type="text" name="Clogin" placeholder="Seu nome de Login">
        <input type="email" name="email" placeholder="Seu E-mail">
        <input type="number" name="idade" placeholder="Sua idade">
        <input type="password" name="Csenha" placeholder="Sua senha">
        <button type="submit" name="btn-cadastro">Cadastrar</button>
        <a href="index.php" class="main-btn">Voltar</a> 
    </form>
</body>
</html>

<?php
//namespaces
use dao\usuarioDAO;
use model\Usuario;
//Sessão
session_start();
//Conexões
require_once 'model/Usuario.php';
require_once 'dao/UsuarioDAO.php';
require_once 'Factory/Connect.php';
//Clear
function Clear($input){
    if (!empty($input)):
      //sql
    $var = preg_replace('/[^[:alpha:]_]/', '',$input);
    //xss
    $var = htmlspecialchars($var);
    return $var;  
    else:
       global $vazio;
       $vazio = true;
    endif;
}
$usuario = new Usuario();
if(isset($_POST['btn-cadastro'])):
    $usuario->setNome(Clear($_POST['nome']));
    $usuario->setLogin(Clear($_POST['Clogin']));
    $usuario->setEmail(($_POST['email']));
    $usuario->setIdade($_POST['idade']);
    $usuario->setSenha((password_hash($_POST['Csenha'],PASSWORD_DEFAULT)));
    if(!$vazio):
        $dao = new usuarioDAO();
        try{
            $dao->Create($usuario);
            $_SESSION['mensagem'] = "Sucesso ao cadastrar";
            header('location: index.php');
        }catch(PDOException $e){
            $_SESSION['mensagem'] = "Erro ao cadastrar: ".$e;
            header('location: index.php');
        }
    endif;
endif;
?>