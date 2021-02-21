<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';
//Clear
function Clear($input){
    global $connect;
    if (!empty($input)):
      //sql
    $var = mysqli_escape_string($connect,$input);
    //xss
    $var = htmlspecialchars($var);
    return $var;  
    else:
       global $vazio;
       $vazio = true;
    endif;
}

if(isset($_POST['btn-cadastro'])):
    $nome = Clear($_POST['nome']);
    $login = Clear($_POST['Clogin']);
    $email = Clear($_POST['email']);
    $idade = Clear($_POST['idade']);
    $senha = Clear($_POST['Csenha']);
    $senhaSegura = password_hash($senha,PASSWORD_DEFAULT);
    if (!$vazio):
        $sql = "INSERT INTO usuario (nome,login,email,idade,senha) VALUES ('$nome','$login','$email','$idade','$senhaSegura')";
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('location: ../../index.php');
    endif;

    if (mysqli_query($connect,$sql)):
        $_SESSION['mensagem'] = "Cadastrado com Sucesso!";
        header('location: ../../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('location: ../../index.php');
    endif;
endif;

