<?php 
    include 'conecta.inc';
    //include 'carregaFoto.php';
    $ganhador = '';
    $func = $_POST["func"];
    $valor = $_POST["valor"];
    $arquivoF = $_FILES['foto'];
    $mes = Date("m");
    $ano = Date("Y");

    function mesExtenso($mes){
        $mesExtenso = '';
        switch($mes){
            case 1:
                $mesExtenso = "Janeiro";
                break;
            case 2:
                $mesExtenso = "Fevereiro";
                break;
            case 3:
                $mesExtenso = "Março";
                break;
            case 4:
                $mesExtenso = "Abril";
                break;
            case 5:
                $mesExtenso = "Maio";
                break;
            case 6:
                $mesExtenso = "Junho";
                break;
            case 7:
                $mesExtenso = "Julho";
                break;
            case 8:
                $mesExtenso = "Agosto";
                break;
            case 9:
                $mesExtenso = "Setembro";
                break;
            case 10:
                $mesExtenso = "Outubro";
                break;
            case 11:
                $mesExtenso = "Novembro";
                break;
            case 12:
                $mesExtenso = "Dezembro";
                break;
        }

        return $mesExtenso;
    }

    $mesNome = mesExtenso($mes);

    function calcularValorBonus($valorVenda): float{
        $valorBonus = 0.0;
        if($valorVenda <= 500.0){
            $valorBonus += ($valorVenda * (1 / 100));
            return $valorBonus;
        }
        elseif($valorVenda >= 501.0 && $valorVenda <= 3000){
            $valorBonus += ($valorVenda * (5 / 100));
            return $valorBonus;
        }
        elseif($valorVenda >= 3001 && $valorVenda <= 10000){
            $valorBonus += ($valorVenda * (10 / 100));
            return $valorBonus;
        }
        else{
            $valorBonus += ($valorVenda * (15 / 100));
            return $valorBonus;
        }
    }

    function receberFoto(){
        $dir = "img/";

        $arquivo = $_FILES['foto'];

        $nome = $_FILES['foto']['name'];
        $tipo = $_FILES['foto']['type'];
        $tamanho = $_FILES['foto']['size'];
        $temporario = $_FILES['foto']['tmp_name'];
        $erro = $_FILES['foto']['error'];


        if(move_uploaded_file($arquivo['tmp_name'], "$dir/".$arquivo['name'])){
            $imagem = "img/ ".$arquivo["name"];
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

    echo receberFoto();


?>