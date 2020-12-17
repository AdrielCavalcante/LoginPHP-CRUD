<?php
// Conexão de arquivos
require_once 'db_connect.php';
//sessão
session_start();

//verificação
if(!isset($_SESSION['logado'])):
    header('Location: index.php');
endif;

$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE id='$id'";
$resultado = mysqli_query($connect,$sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página restrita</title>
</head>
<body>
    <h1>Olá <?php echo $dados['nome']; ?> </h1>
    <a href="logout.php">Sair</a>
</body>
</html>