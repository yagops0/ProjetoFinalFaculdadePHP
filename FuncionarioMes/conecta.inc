<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "Yps@01200520";
    $banco = "dbempresa";

    $con = mysqli_connect($servidor, $usuario, $senha, $banco) or die("Erro conexao");

    //echo "conexao ok";
    mysqli_set_charset($con,"utf8");


?>