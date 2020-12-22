
<?php
//Sessão
session_start();

use dao\UsuarioDAO;

//Conexão
require_once 'dao/UsuarioDAO.php';
require_once 'Factory/Connect.php';

$dao = new usuarioDAO();

if(isset($_POST['btn-deleta'])):
    $id = $_POST['id'];
        try{
        $dao->Delete($id);
        $_SESSION['mensagem'] = "Conta deletada com Sucesso!";
        header('location: index.php');
        }catch(PDOException $e){
        $_SESSION['mensagem'] = "Erro ao Deletar a conta!";
        header('location: index.php');
     }
endif;

