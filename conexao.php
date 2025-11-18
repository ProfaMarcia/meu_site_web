<?php 
$host = "localhost"; //nome do servidor
$usuario = "root";
$senha = "";
$banco = "meu_site";

$conexao = new mysqli($host,$usuario,$senha,$banco);
if($conexao->connect_error){
    die("Erro na conexão: ".$conexao->connect_error);
}
?>