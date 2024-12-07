<?php 
    include 'conecta.inc';

    $registros = $_POST['data'];

    $dados = json_decode($registros, true);

    var_dump($dados);

    $codigo = $dados["codigo"];

    $query = "Delete from tbfuncmes where codigo =$codigo";

    $resul = mysqli_query($con, $query) or die ("Erro na Exclusão");

    mysqli_close($con);
    
?>