<?php 
    require'banco.php';

    $sql = "select * from cidade order by cod_cidade";
    $qry = $con->prepare($sql);
    $qry->execute();
    //$nr = $qry->rowCount();
    //echo $nr;
    $registros = $qry->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($registros);
?>