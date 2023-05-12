<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro Veículo</title>
    </head>
    <body>
        <div>
            <form method = 'POST'>
                <label for = "placa">Digite a Placa: </label>
                <input type = "text" id = "placa" name = "placa"  maxlength = "10"><br>
                <label for = "marca">Digite a Marca: </label>
                <input type = "text" id = "marca" name = "marca"  maxlength = "20"><br>
                <label for = "modelo">Digite o Modelo: </label>
                <input type = "text" id = "modelo" name = "modelo"  maxlength = "50"><br>
                <label for = "ano">Digite o Ano: </label>
                <input type = "text" id = "ano" name = "ano"  maxlength = "10"><br>
                <label for = "preco">Digite o Preço: </label>
                <input type = "text" id = "preco" name = "preco"  maxlength = "15"><br>
                <label for = "quilometragem">Digite a Quilometragem: </label>
                <input type = "text" id = "quilometragem" name = "quilometragem"  maxlength = "10"><br>
                <label for = "historico">Digite o Hístorico: </label>
                <input type = "text" id = "historico" name = "historico"  maxlength = "200"><br>
                <input type="submit" value="Cadastrar Veículo" name="Enviar">
                <button name = 'voltar'>Voltar</button>

            </form>
            
        </div>
        <?php

            session_start();
            $usuario = $_SESSION['usu_usuario'];
            $id = $_SESSION['usu_id'];
            
            if (isset($_POST['voltar'])) {
                header('location:./index.php');
            }

            if (isset($_POST["Enviar"])) {

                $placa = $_POST["placa"];
                $marca = $_POST["marca"];
                $modelo = $_POST["modelo"];
                $ano = $_POST["ano"];
                $preco = $_POST["preco"];
                $quilometragem = $_POST["quilometragem"];
                $historico = $_POST["historico"];

                require_once('../conexao.php');

                //
                $vei = "SELECT vei_placa
                FROM veiculo
                WHERE ( vei_placa = '$placa')
                ";
                $resultado = mysqli_query($con , $vei);

                //
                if (mysqli_num_rows($resultado) > 0){   
                    echo "A placa $placa já existe no banco de dados";
                } else {
                    $veiculo = "INSERT INTO veiculo
                    (vei_id,
                    usu_id,
                    vei_placa,
                    vei_marca,
                    vei_modelo,
                    vei_ano,
                    vei_preco,
                    vei_quilometragem,
                    vei_historico)
                    VALUES 
                    (DEFAULT,
                    '$id',
                    '$placa',
                    '$marca',
                    '$modelo',
                    '$ano',
                    '$preco',
                    '$quilometragem',
                    '$historico')
                    ";
                    mysqli_query($con,$veiculo);

                    if (mysqli_error($con)) {
                        echo "Erro ao executar a query: ". mysqli_error($con);
                    } else {
                        echo "Dados inseridos com sucesso!";
                    }
                }

                mysqli_close($con); 
            }
        ?>
    </body>
</html>