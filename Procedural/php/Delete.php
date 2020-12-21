<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-deleta'])):
    $id = $_POST['id'];

    $sql = "DELETE FROM usuario WHERE id='$id'";

    if (mysqli_query($connect,$sql)):
        $_SESSION['mensagem'] = "Conta deletada com Sucesso!";
        header('location: index.php?Sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao Deletar a conta!";
        header('location: index.php?Erro');
    endif;
endif;

