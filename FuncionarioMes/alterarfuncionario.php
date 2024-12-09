<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">

  
    <script>

        function Carrega(campo) {
            if (campo.files && campo.files[0]) {
                var file = new FileReader();
                file.onload = function (e) {
                    document.getElementById("ganhador").src = e.target.result;
                };
                file.readAsDataURL(campo.files[0]);
            }
            document.getElementById("foto").addEventListener("change", readImage, false);
        }

        function selecao(frm) {
            var valor = document.getElementById("valor").value;
            var foto = document.getElementById("foto").value


            frm.submit();
        }

        function mascara(o, f) {
            v_obj = o
            v_fun = f
            setTimeout("execmascara()", 1)
        }

        function execmascara() {
            v_obj.value = v_fun(v_obj.value)
        }


        function moeda(v) {
            v = v.replace(/\D/g, "") // permite digitar apenas numero
            //  v=v.replace(/(\d{1})(\d{10})$/,"$1.$2") // coloca ponto antes dos ultimos 13 digitos
            //v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 10 digitos
            //v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 7 digitos
            v = v.replace(/(\d{1})(\d{1,2})$/, "$1.$2") // coloca virgula antes dos ultimos 2 digitos
            return v;
        }


    </script>

</head>

<body>
    
    <div class="container">
        <br>
        <button> <a href="javascript: history.back()">Voltar </a> </button>
        <h2>ALTERAÇÃO</h2>
        <br>

        <form method="POST" id="form1" name="form1" action="alterar.php" enctype="multipart/form-data"
            onSubmit="selecao(this); return false;">

            <div class="row">
                <div class="col-lg-5 mx-auto">

                    <center> 
                        <?php 
                            include 'conecta.inc';
                            $codigo = $_POST["codigo"];

                            echo "<input type='hidden' name='codigo' id='codigo' value='$codigo'>";

                            $resul = mysqli_query($con, "Select caminhoimg from tbfuncmes where codigo = '$codigo'");

                            $total = mysqli_num_rows($resul);

                            $row = mysqli_fetch_array($resul);

                            $caminho = $row['caminhoimg'];

                            if($total < 1){
                                echo "<script>alert('Não há dados na base');
                                location.href = 'cadastro.php'</script>";
                            }
                            else{
                                echo "<img src='$caminho' name='ganhador' id='ganhador' class='img-fluid' class='rounded float-left'>";    
                            }
                        ?>

                        <div class="file-field input-field col s8">
                            <div class="btn btn-primary btn-sm">
                                <input type="file" name="foto" id="foto" accept=".png,.jpg " class="form-control"
                                    onchange="Carrega(this)">
                            </div>
                        </div>
                    </center>
                    <br>


                </div>


                <div class="col-lg-7 mx-auto">
                            <div class="form-group">
                                <label for="nome"><b>Nome:</b></label>
                                <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nomeHelp" placeholder="Nome atualizado" required >
                                <small id="nomeHelp" class="form-text text-muted">Digite o nome atualizado</small>
                            </div>

                            <div class="form-group">
                            <div class="form-text">
                                <b>Atualizar o valor da venda(o valor de bônus será mudado automaticamente):</b>
                                <input type="text" class="form-control w-25" id="valor" name="valor"
                                    placeholder="Valor Vendas" required="required"
                                    data-validation-required-message="Por favor digite o valor de venda"
                                    onkeypress="mascara(this, moeda)" maxlength="10">
                            </div>

                            <br><br>



                            <button class="btn btn-primary" type="submit">Atualizar</button>

                        </div>
                </div>
        </form>
    </div>

</body>


</html>





</body>

</html>