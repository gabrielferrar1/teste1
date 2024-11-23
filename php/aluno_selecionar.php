<?php 
require 'banco.php';

if (!isset($_GET['matricula'])){
    echo "A matrícula deve ser válida";
    exit();
}

$matricula = $_GET['matricula'];

$sql = "SELECT nome, nota1, nota2 FROM aluno
        WHERE matricula = :matricula";
$qry = $con->prepare($sql);
$qry->bindParam(':matricula', $matricula, PDO::PARAM_INT);
$qry->execute();
$registros = $qry->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($registros);
?>
