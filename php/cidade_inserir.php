<?php 
require 'banco.php';

if (!isset($_GET['cidade']) || !isset($_GET['uf'])) {
    echo "Erro, cidade e estado são obrigatórios";
    exit();
}
$cidade = $_GET['cidade']; 
$UF = $_GET['uf'];


$sql = "INSERT INTO cidade (cidade, uf) 
                    VALUES (:cidade, :uf)";
$qry = $con->prepare($sql);
$qry->bindParam(':cidade', $cidade, PDO::PARAM_STR);
$qry->bindParam(':uf', $UF, PDO::PARAM_STR);
$qry->execute();
$nr = $qry->rowCount();
echo $nr;
?>
