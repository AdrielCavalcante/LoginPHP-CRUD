<?php
//Conexão com o banco de dados

$servername = "localhost";
$username = "root";
$password = "";
$banconome = "loginPHP";

//Importar o banco de dados na pasta SQL
$connect = mysqli_connect($servername,$username,$password,$banconome);

if(mysqli_connect_error()):
    echo "falha na conexão".mysqli_connect_error();
endif;
?>