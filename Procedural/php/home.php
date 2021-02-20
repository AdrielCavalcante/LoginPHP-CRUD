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
    <link rel="stylesheet" href="../../css/Home.css">
    <title>Sua Home</title>
</head>
<body>
    <div id="divi">
    <h1>Olá <?php echo $dados['nome']; ?> </h1>
    <h3 id="txt1">Clique aqui para editar a conta:</h3>
    <h3 id="txt2">Clique aqui para deletar a conta:</h3>
    <a href="AtualizarConta.php?id=<?php echo $dados['id']; ?>"><button id="btn1">Editar</button></a>
    <a href="DeletarConta.php?id=<?php echo $dados['id']; ?>"><button id="btn2">Deletar</button></a>
    <a class="main-btn" href="logout.php" id="sair">Sair</a>
    </div>
</body>
</html>