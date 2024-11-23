<?php 
require 'banco.php';

// Verifique se todos os parâmetros estão definidos corretamente
if (!isset($_GET['cod_cidade']) || !isset($_GET['cidade']) || !isset($_GET['uf'])) {
    echo "Erro, cidade, estado e código da cidade são obrigatórios";
    exit();
}

$cod_cidade = $_GET['cod_cidade'];
$cidade = $_GET['cidade']; 
$UF = $_GET['uf'];

$sql = "UPDATE cidade  
        SET cidade = :cidade, 
            uf = :uf
        WHERE cod_cidade = :cod_cidade";
$qry = $con->prepare($sql);
$qry->bindParam(':cod_cidade', $cod_cidade, PDO::PARAM_INT);
$qry->bindParam(':cidade', $cidade, PDO::PARAM_STR);
$qry->bindParam(':uf', $UF, PDO::PARAM_STR);
$qry->execute();

$nr = $qry->rowCount();
echo $nr;
?>
