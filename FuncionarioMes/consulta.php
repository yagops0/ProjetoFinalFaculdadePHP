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
    <div class="container">
        <br>
        <button> <a href="javascript: history.back()">Voltar </a> </button>
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <h2 class="page-section-heading text-center text-uppercase text-secondary">CONSULTA</h2>
                <br>
                <form method="post" action="consultanome.php">
                    <div class="form-group">
                        <div class="control-group">
                            <label for="nome"><b>Por funcionário</b></label>
                            <br>
                            <select name="nome" id="nome" class="custom-select mr-sm-2">
                                <?php 
                                    include 'conecta.inc';
                                    $resul = mysqli_query($con, "Select nome from tbfuncmes");
                                    $total = mysqli_num_rows($resul);

                                    if($total < 1){
                                        echo "<script>alert('Não há dados na base');
                                        location.href = 'cadastro.php'</script>";
                                    }
                                    else{
                                        while($row = mysqli_fetch_array($resul)){
                                            echo '<option value="' . $row['nome'] . '">' . $row['nome'] . '</option>';

                                        }
                                        echo '<option value="todos"> Todos </option>';
                                        echo '</select>';
                                    }
                                ?>

                        </div>
                    
                    <br>
                    <button type="submit" class="btn btn-primary">Consulta Funcionário</button>

                </form>

                <form method="post" action="consultamesano.php">
                    <label for="nome"><b>Por Mês/Ano</b></label>
                    <br>
                    <select name="ano" id="ano" class="custom-select mr-sm-2">
                        <option selected><<< Escolha o Ano >>></option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                    </select>

                    <br><br>
                    
                    <select name="mes" id="mes" class="custom-select mr-sm-2">
                        <option selected><<< Escolha o Mês >>></option>
                        <option value="1">Janeiro</option>
                        <option value="2">Fevereiro</option>
                        <option value="3">Março</option>
                        <option value="4">Abril</option>
                        <option value="5">Maio</option>
                        <option value="6">Junho</option>
                        <option value="7">Julho</option>
                        <option value="8">Agosto</option>
                        <option value="9">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </select>

                    <button type="submit" class="btn btn-primary">Consulta Mês/Ano</button>
                </form>
            </div>
        </div>

        
    </div>
</body>
</html>