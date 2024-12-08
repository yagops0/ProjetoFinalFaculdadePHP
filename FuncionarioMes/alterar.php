<?php 
    include 'conecta.inc';
    $ganhador = '';
    $valorBonus = 0.0;
    $funcNome = $_POST["nome"];
    $valor = $_POST["valor"];
    $codigo = $_POST["codigo"];



    function calcularValorBonus($valorVenda): float{
        $valorBonus = 0.0;
        if($valorVenda <= 500.0){
            $valorBonus = $valorVenda * (1 / 100);
            return $valorBonus;
        }
        elseif($valorVenda >= 501.0 && $valorVenda <= 3000){
            $valorBonus = $valorVenda * (5 / 100);
            return $valorBonus;
        }
        elseif($valorVenda >= 3001 && $valorVenda <= 10000){
            $valorBonus = $valorVenda * (10 / 100);
            return $valorBonus;
        }
        else{
            $valorBonus = $valorVenda * (15 / 100);
            return $valorBonus;
        }
    }

    $valorBonus = calcularValorBonus($valor);

    function receberFoto(){
        $dir = "img/";

        $arquivo = $_FILES['foto'];

        $nome = $_FILES['foto']['name'];
        $tipo = $_FILES['foto']['type'];
        $tamanho = $_FILES['foto']['size'];
        $temporario = $_FILES['foto']['tmp_name'];
        $erro = $_FILES['foto']['error'];


        if(move_uploaded_file($arquivo['tmp_name'], "$dir/".$arquivo['name'])){
            $imagem = "img/".$arquivo["name"];
            echo "<img src=\"$imagem\"><br>";
            
            return $imagem;
            
        }
        else
        {
            return "<script>
                alert('Erro ao enviar o arquivo. Tente novamente');
                history.back();
            ";
        }
    }

    $ganhador = receberFoto();

    

    if($ganhador != null || $valorBonus != 0.0 || $funcNome != null || $valor != null){
        $resul = mysqli_query($con, "Select * from tbfuncmes where codigo='$codigo'") or die ("Erro na consulta");
        $total = mysqli_num_rows($resul);

        if($total == 1)
        {
            $sql= "Update tbfuncmes set nome='$funcNome', vrvenda='$valor', caminhoimg='$ganhador' where codigo='$codigo'";
            mysqli_query($con, $sql) or die ("Erro inclusão");
            echo "<script> alert ('Dados do funcionário alterados com sucesso!');
            history.back();
            </script>";
        }

    }
    else{
        echo "<script>alert('Ocorreu um erro ao inserir o dado.')</script>";
    }
?>