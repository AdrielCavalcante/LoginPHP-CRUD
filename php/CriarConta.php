<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/criar.css">
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
    </form>
</body>
</html>