<?php 
require 'banco.php';

// Verifique se todos os parâmetros estão definidos corretamente
if (!isset($_GET['matricula']) || !isset($_GET['nome']) || !isset($_GET['nota1']) || !isset($_GET['nota2']) || !isset($_GET['cod_cidade'])) {
    echo "Erro, cidade, estado e código da cidade são obrigatórios";
    exit();
}

$matricula = $_GET['matricula']; 
$nome = $_GET['nome']; 
$nota1 = $_GET['nota1'];
$nota2 = $_GET['nota2'];
$cod_cidade = $_GET['cod_cidade'];

$sql = "UPDATE aluno  
        SET nome = :nome, 
            nota1 = :nota1,
            nota2 = :nota2,
            cod_cidade = :cod_cidade
        WHERE matricula = :matricula";
$qry = $con->prepare($sql);
$qry->bindParam(':matricula', $matricula, PDO::PARAM_INT);
$qry->bindParam(':nome', $nome, PDO::PARAM_INT);
$qry->bindParam(':nota1', $nota1, PDO::PARAM_STR);
$qry->bindParam(':nota2', $nota2, PDO::PARAM_STR);
$qry->bindParam(':cod_cidade', $cod_cidade, PDO::PARAM_STR);
$qry->execute();

$nr = $qry->rowCount();
echo $nr;
?>
