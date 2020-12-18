<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';
//Clear
function Clear($input){
    global $connect;
    //sql
    $var = mysqli_escape_string($connect,$input);
    //xss
    $var = htmlspecialchars($var);
    return $var;
}

if(isset($_POST['btn-cadastro'])):
    $nome = Clear($_POST['nome']);
    $login = Clear($_POST['Clogin']);
    $email = Clear($_POST['email']);
    $idade = Clear($_POST['idade']);
    $senha = Clear($_POST['Csenha']);

    $sql = "INSERT INTO usuario (nome,login,email,idade,senha) VALUES ('$nome','$login','$email','$idade',md5('$senha'))";

    if (mysqli_query($connect,$sql)):
        $_SESSION['mensagem'] = "Cadastrado com Sucesso!";
        header('location: index.php?Sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('location: index.php?Erro');
    endif;
endif;

