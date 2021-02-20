<?php

use dao\usuarioDAO;

require_once 'Factory/Connect.php';
require_once 'dao/UsuarioDAO.php';

/*$usuario = new usuario();


$dao = new usuarioDAO();
$dao->Select($usuario);

foreach($dao->Select() as $usuario):
    echo $usuario['nome']."<br>".$usuario['login']."<br>".$usuario['email']."<br>".$usuario['idade']."<br>".$usuario['senha']."<hr>";
endforeach;*/?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/selecionar.css">
    <title>Contas ativas</title>
</head>
<body>
    
        <h3>Usuários</h3>
        <a href="index.php" class="main-btn">Sair</a>
        <table>
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Login:</th>
                    <th>Email:</th>
                    <th>Idade:</th>
                    <th>Senha:</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $dao = new UsuarioDAO();
                    foreach($dao->Select() as $usuario):
                ?>
                <tr>
                    <td><?php echo $usuario['nome']; ?></td>
                    <td><?php echo $usuario['login']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                    <td><?php echo $usuario['idade']; ?></td>
                    <td><?php echo $usuario['senha']; ?></td>
                </tr>
                <?php
                    endforeach;
                ?>
            </tbody>
        </table>

</body>
</html>