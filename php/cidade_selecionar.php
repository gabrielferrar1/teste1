<?php 
require 'banco.php';

if (!isset($_GET['cod_cidade'])){
    echo "Código da cidade obrigatório";
    exit();
}

$cod_cidade = $_GET['cod_cidade'];

$sql = "SELECT cod_cidade, cidade, uf FROM cidade
        WHERE cod_cidade = :cod_cidade";
$qry = $con->prepare($sql);
$qry->bindParam(':cod_cidade', $cod_cidade, PDO::PARAM_INT);
$qry->execute();
$registros = $qry->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($registros);
?>
