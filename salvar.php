<?php 
include "conexao.php";

$nome = htmlspecialchars($_POST['nome']);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

if(!$email){
    die("E-mail inválido");
}

$verificar = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
$verificar->bind_param("s", $email);
$verificar->execute();
$resultado = $verificar->get_result();
if($resultado->num_rows > 0){
    die("E-mail já cadastrado");
}
$stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, senha)
VALUES (?,?,?)");
$stmt->bind_param("sss", $nome, $email, $senha);

if($stmt->execute()){
    echo "Usuário cadastrado com sucesso!<a href='login.html'>Fazer Login</a>";
} else {
    echo "Erro ao cadastrar usuário: " . $stmt->error;
}

$stmt->close();
$conexao->close();

?>