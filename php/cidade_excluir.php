<?php 
require 'banco.php';

if (!isset($_GET['cod_cidade'])){
    echo "Código da cidade obrigatório";
    exit();
}

$cod_cidade = $_GET['cod_cidade'];

$sql = "DELETE FROM cidade
        WHERE cod_cidade = :cod_cidade";
$qry = $con->prepare($sql);
$qry->bindParam(':cod_cidade', $cod_cidade, PDO::PARAM_INT);
$qry->execute();

$nr = $qry->rowCount();
echo $nr;
?>
