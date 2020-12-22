<?php
//Conexão
use Factory\Connect;
require_once 'Factory/Connect.php';

if(isset($_GET['id'])):
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuario WHERE id='$id'";
    $stmt = Connect::GetConexao()->prepare($sql);
    $stmt->execute();
    $dados = $stmt->fetch();
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
    <form class="deleta" action="deletar.php" method="post">
        <h1>Deletar usuário</h1>
        <h2>Você tem certeza que deseja deletar a conta?</h2>
        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
        <button type="submit" name="btn-deleta" id="btns">Tenho certeza</button>
        <a href="home.php"><button type="button" id="btnn">Cancelar</button></a>
    </form>
</body>
</html>