<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
    
    <script>
        function excluir(x) {

            var r = confirm("Tem certeza que deseja excluir este funcionário?");
            if (r == true) {
                var exclusaodados = {
                    'codigo': x
                }

                var dados = JSON.stringify(exclusaodados);

                $.ajax({
                    url: 'excluirjson.php',
                    type: 'POST',
                    data: { data: dados },
                    success: function (result) {
                        alert('Registro Excluído');
                        window.location.href = "exclui.php";

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('Avise o administrador pois esta rotina esta com erro ... ROTINA: EXCLUSÃO!');
                    }
                });

            }
            else {
                alert("Exclusão Cancelada!");
            }


        }
    </script>
</head>

<body>
    <div class="container">
        <br>
        <button> <a href="javascript: history.back()">Voltar </a> </button>
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <h2 class="page-section-heading text-center text-uppercase text-secondary">EXCLUSÃO</h2>

                <form name="form1" id="form1">
                    <div class="form-group">
                        <div class="control-group">
                            <b>Escolha um funcionário para excluir</b>
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

                    <button class="btn btn-primary" onclick="excluir(document.getElementById('codigo').value)">Excluir</button>
                    <br><br>
                </form>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>

</html>