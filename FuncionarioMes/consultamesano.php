<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>

    <button><a href="consulta.php"> Voltar </a></button>

    
    <?php

use function PHPSTORM_META\type;

    include 'conecta.inc';

    $ano = $_POST["ano"];
    //echo gettype($ano);
    $mes = $_POST["mes"];

    function converterParaInt($numeroStr){
        return intval($numeroStr);
    }

    $anoInt = converterParaInt($ano);
    echo gettype($anoInt);
      
    if(ISSET($ano) && ISSET($mes)){
        $resul = mysqli_query($con, "Select * from tbfuncmes where ano = $anoInt and mes = '$mes'");
    }
    else if(ISSET($ano)){
        $resul = mysqli_query($con, "Select * from tbfuncmes where ano = $anoInt");
    }
        

    $total = mysqli_num_rows($resul);

    if ($total < 1) {
        echo "<script>
            alert('Não há dados na base');
            location. href = 'cadastra.html';
            history.back('consulta.php');
            </script>";
        //aqui você poderia usar history.back() se tivesse uma paǵina anterior com o menu
    } else {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <h2 class="page-section-heading text-center text-uppercase
        text-secondary">CONSULTA</h2>
                    <br>
                    <br>


                    <?php

                    echo "<center> <table border='5'>";
                    
                    
                        
                        while($row = mysqli_fetch_array($resul)){

                            echo '<tr class="teste"><th><center><img src='.$row['caminhoimg'].'></center></th></tr>';
                            echo "<tr><th><b>NOME</b></th> <th> <b>MÊS</b></th> <th> <b>ANO</b></th> <th> <b>VALOR VENDA</b></th> <th><b>VALOR BÔNUS</b></th></tr>";
                            
                            echo '<tr><td>' .$row['nome']. '</td>';
                            echo '<td>' . $row['mes']. '</td>';
                            echo '<td>' . $row['ano']. '</td>';
                            echo '<td>' . $row['vrvenda']. '</td>';
                            echo '<td>' . $row['vrbonus']. '</td></tr>';
                        }

                    echo "</table></center>";


    }

    ?>
            </div>
        </div>
    </div>



</body>

</html>