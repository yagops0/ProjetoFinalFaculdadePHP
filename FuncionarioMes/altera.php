<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <br>
        <button> <a href="javascript: history.back()">Voltar </a> </button>
        <br>
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <h2 class="page-section-heading text-center text-uppercase text-secondary">ALTERAÇÃO</h2>
                <form method="POST" action="alterarfuncionario.php">
                    <div class="form-group">
                        <div class="control-group">
                            <b>Escolha um funcionário para atualizar os dados</b>
                            <br>
                            <select name="codigo" id="codigo" class="custom-select mr-sm-2">
                                <option selected><<< Escolha um Funcionário >>></option>
                                <?php
                                    include 'conecta.inc';
                                    $resul = mysqli_query($con, "Select codigo, nome from tbfuncmes");
                                    $total = mysqli_num_rows($resul);

                                    if ($total < 1) {
                                        echo "<script>alert('Não há dados na base');
                                            location.href='cadastra.html';</script>";
                                    } else {
                                        while ($row = mysqli_fetch_array($resul)) {
                                            echo '<option value="' . $row['codigo'] . '">' . $row['nome'] . '</option>';
                                        }   

                                        echo '</select>';
                                    }

                                    mysqli_close($con);
                                ?>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                    <br><br>
                </form>
            </div>
    </div>
</body>
</html>