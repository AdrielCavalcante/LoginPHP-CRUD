<?php

use dao\usuarioDAO;
use model\Usuario;

require_once 'Factory/Connect.php';
require_once 'model/Usuario.php';
require_once 'dao/UsuarioDAO.php';

$usuario = new usuario();


$dao = new usuarioDAO();
$dao->Select($usuario);

foreach($dao->Select() as $usuario):
    echo $usuario['nome']."<br>".$usuario['login']."<br>".$usuario['email']."<br>".$usuario['idade']."<br>".$usuario['senha']."<hr>";
endforeach;
?>