<?php
session_start();

//Verificar se o usuário está logado!
if(!isset($_SESSION['usuario'])){
    header("Location: login.html");
    exit;
}else{
    $nome = htmlspecialchars($_SESSION['usuario']);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h2>Seja bem vindo <?= $nome;  ?></h2>
        <p>Você está logado no sistema.</p>
        <a href="logout.php">Sair</a>     
    </body>
    </html>

<?php
}
?>