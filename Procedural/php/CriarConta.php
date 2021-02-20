<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <!-- Estilos -->
    <link rel="stylesheet" href="../../css/criar.css">
    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <title>Adicionar</title>
</head>
<body>
    <form class="adiciona" action="../php/Create.php" method="POST">
        <h1>Cadastrar usuário</h1>
        <input type="text" name="nome" placeholder="Seu nome">
        <input type="text" name="Clogin" placeholder="Seu nome de Login">
        <input type="email" name="email" placeholder="Seu E-mail">
        <input type="number" name="idade" placeholder="Sua idade">
        <input type="password" name="Csenha" placeholder="Sua senha">
        <button type="submit" name="btn-cadastro">Cadastrar</button>
        <a href="index.php" class="main-btn">Voltar</a> 
    </form>
</body>
</html>