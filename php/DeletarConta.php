<?php
//Conexão
require_once 'db_connect.php';

if(isset($_GET['id'])):
    $id = mysqli_escape_string($connect,$_GET['id']);

    $sql = "SELECT * FROM usuario WHERE id='$id'";
    $resultado = mysqli_query($connect,$sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/deletar.css">
    <title>Deletar</title>
</head>
<body>
    <form class="deleta" action="delete.php" method="post">
        <h1>Deletar usuário</h1>
        <h2>Você tem certeza que deseja deletar a conta?</h2>
        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
        <button type="submit" name="btn-deleta" id="btns">Tenho certeza</button>
        <a href="home.php"><button type="button" id="btnn">Cancelar</button></a>
    </form>
</body>
</html>