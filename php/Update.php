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

if(isset($_POST['btn-atualiza'])):
    $nome = Clear($_POST['nome']);
    $login = Clear($_POST['Clogin']);
    $email = Clear($_POST['email']);
    $idade = Clear($_POST['idade']);
    $senha = Clear($_POST['Csenha']);
    $id = Clear($_POST['id']);

    $sql = "UPDATE usuario SET nome='$nome',login='$login',email='$email',idade='$idade',senha=md5('$senha') WHERE id='$id' ";

    if (mysqli_query($connect,$sql)):
        $_SESSION['mensagem'] = "Atualizado com Sucesso!";
        header('location: index.php?Sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao Atualizar!";
        header('location: index.php?Erro');
    endif;
endif;

