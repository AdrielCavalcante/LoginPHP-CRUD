<?php
//Sessão
session_start();
//Conexão
require_once '../../db_connect.php';
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

if(isset($_POST['btn-atualiza'])):
    $nome = Clear($_POST['nome']);
    $login = Clear($_POST['Clogin']);
    $email = Clear($_POST['email']);
    $idade = Clear($_POST['idade']);
    $senha = Clear($_POST['Csenha']);
    $id = Clear($_POST['id']);
    $senhaSegura = password_hash($senha,PASSWORD_DEFAULT);

    if (!$vazio):
        $sql = "UPDATE usuario SET nome='$nome',login='$login',email='$email',idade='$idade',senha='$senhaSegura' WHERE id='$id' ";
    else:
        $_SESSION['mensagem'] = "Erro ao Atualizar!";
        header('location: ../../index.php');
    endif;
    if (mysqli_query($connect,$sql)):
        $_SESSION['mensagem'] = "Atualizado com Sucesso!";
        header('location: ../../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao Atualizar!";
        header('location: ../../index.php');
    endif;
endif;

