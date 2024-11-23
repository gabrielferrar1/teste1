<?php 
    require'banco.php';

    $sql = "select * from aluno order by matricula";
    $qry = $con->prepare($sql);
    $qry->execute();
    //$nr = $qry->rowCount();
    //echo $nr;
    $registros = $qry->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($registros);
?>