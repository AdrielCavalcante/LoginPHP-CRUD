<?php
//Sessão
session_start();
//Conexão
use dao\usuarioDAO;
use model\Usuario;

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

if(isset($_POST['btn-atualiza'])):
    $usuario = new Usuario();
    $usuario->setNome(Clear($_POST['nome']));
    $usuario->setLogin(Clear($_POST['Clogin']));
    $usuario->setEmail($_POST['email']);
    $usuario->setIdade($_POST['idade']);
    $usuario->setSenha(password_hash($_POST['Csenha'],PASSWORD_DEFAULT));
    $usuario->setId($_POST['id']);

    if (!$vazio):
        $dao = new usuarioDAO();
        try{
        $dao->Update($usuario);
        $_SESSION['mensagem'] = "Sucesso ao Atualizar";
        header('location: index.php');
    }catch(PDOException $e){
        $_SESSION['mensagem'] = "Erro ao Atualizar: ".$e;
        header('location: index.php');
    }
    endif;
endif;