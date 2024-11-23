<?php 
require 'banco.php';

if (!isset($_GET['matricula'])){
    echo "Código da matricula obrigatório";
    exit();
}

$matricula = $_GET['matricula'];

$sql = "DELETE FROM aluno
        WHERE matricula = :matricula";
$qry = $con->prepare($sql);
$qry->bindParam(':matricula', $matricula, PDO::PARAM_INT);
$qry->execute();

$nr = $qry->rowCount();
echo $nr;
?>
