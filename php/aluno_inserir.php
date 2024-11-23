<?php 
require 'banco.php';

if (!isset($_GET['nome']) || !isset($_GET['nota1']) || !isset($_GET['nota1']) || !isset($_GET['cod_cidade'])) {
    echo "Todas as informações devem ser preenchidas";
    exit();
}

$nome = $_GET['nome']; 
$nota1 = $_GET['nota1'];
$nota2 = $_GET['nota2'];
$cod_cidade = $_GET['cod_cidade'];


$sql = "INSERT INTO aluno (nome, nota1, nota2, cod_cidade) 
                    VALUES (:nome, :nota1, :nota2, :cod_cidade)";
$qry = $con->prepare($sql);
$qry->bindParam(':nome', $nome, PDO::PARAM_STR);
$qry->bindParam(':nota1', $nota1, PDO::PARAM_STR);
$qry->bindParam(':nota2', $nota2, PDO::PARAM_STR);
$qry->bindParam(':cod_cidade', $cod_cidade, PDO::PARAM_STR);
$qry->execute();
$nr = $qry->rowCount();
echo $nr;
?>
