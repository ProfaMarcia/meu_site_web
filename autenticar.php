<?php

session_start();

include "conexao.php";

$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$senha = $_POST['senha'];

if(!$email){
    die("E-mail não é válido!");
}

//Buscar usuário no banco
$buscar = $conexao->prepare("SELECT * FROM usuarios WHERE email=?");
$buscar->bind_param("s", $email);
$buscar->execute();
$resultado = $buscar->get_result();

if($resultado->num_rows>0){
    $usuario = $resultado->fetch_assoc();

    //Verificar a senha
    if(password_verify($senha, $usuario['senha'])){
        $_SESSION['usuario'] = $usuario['nome'];
        header("Location:painel.php");
        exit;
    } else {
        echo "Usuário ou Senha Incorreto!";
    }
}else{
    echo "Usuário não encontrado!";
}

$buscar->close();
$conexao->close();
?>