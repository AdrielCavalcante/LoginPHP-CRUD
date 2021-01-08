<?php
//Conexão com o banco de dados

$servername = "localhost";
$username = "root";
$password = "";
$banconome = "loginPHP";
//Tabela = usuario
//campos = id(Chave primária), nome(varchar255), login(varchar255), email(varchar255),idade(int3), senha(varchar255)
//valor inserido para o login = login=admin, senha=1234
$connect = mysqli_connect($servername,$username,$password,$banconome);

if(mysqli_connect_error()):
    echo "falha na conexão".mysqli_connect_error();
endif;
?>
