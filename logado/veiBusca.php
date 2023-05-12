<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>busca de veículo</title>
</head>
<body>
    <form method="post">
        <label for = "marca">Digite a Marca: (max:20)</label>
        <input type = "text" id = "marca" name = "marca"  maxlength = "20"><br>
        <label for = "modelo">Digite o Modelo: (max:50)</label>
        <input type = "text" id = "modelo" name = "modelo"  maxlength = "50"><br>
        <label for = "ano">Digite o Ano: (max:10)</label>
        <input type = "text" id = "ano" name = "ano"  maxlength = "10"><br>    
        <input type = "submit" value = "Enviar" name = "Enviar">
        <button name = 'voltar'>Voltar</button>
    </form><br>
    
    <?php

        if (isset($_POST['voltar'])) {
            header('location: ./index.php');
        }

        if (isset($_POST["Enviar"])){
            require_once('./conexao.php');
            $marca = $_POST["marca"];
            $modelo = $_POST["modelo"];
            $ano = $_POST["ano"];
            if ($marca != "" && $modelo != "" && $ano != ""){
                $veiculo = " SELECT vei_marca, vei_modelo, vei_ano , vei_preco, vei_quilometragem, vei_historico
                FROM veiculo 
                WHERE ( vei_marca = '$marca' && vei_modelo = '$modelo' && vei_ano = '$ano' )
                ";
            }else if($marca != "" && $modelo != ""){
                $veiculo = " SELECT vei_marca, vei_modelo, vei_ano , vei_preco, vei_quilometragem, vei_historico
                FROM veiculo 
                WHERE ( vei_marca = '$marca' && vei_modelo = '$modelo')
                ";
            }else if($marca != "" && $ano != ""){
              $veiculo = " SELECT vei_marca, vei_modelo, vei_ano , vei_preco, vei_quilometragem, vei_historico
              FROM veiculo 
              WHERE ( vei_marca = '$marca' && vei_ano = '$ano' )
              "; 
            }else if ($modelo != "" && $ano != ""){
                $veiculo = " SELECT vei_marca, vei_modelo, vei_ano , vei_preco, vei_quilometragem, vei_historico
                FROM veiculo 
                WHERE (vei_modelo = '$modelo' && vei_ano = '$ano' )
                ";
            }else if ($marca != "") {
                $veiculo = " SELECT vei_marca, vei_modelo, vei_ano , vei_preco, vei_quilometragem, vei_historico
                FROM veiculo 
                WHERE ( vei_marca = '$marca'  )
                ";
            }else if ($modelo != "") {
                $veiculo = " SELECT vei_marca, vei_modelo, vei_ano , vei_preco, vei_quilometragem, vei_historico
                FROM veiculo 
                WHERE ( vei_modelo = '$modelo'  )
                ";
            }else if ($ano != "") {
                $veiculo = " SELECT vei_marca, vei_modelo, vei_ano , vei_preco, vei_quilometragem, vei_historico
                FROM veiculo 
                WHERE ( vei_ano = '$ano'  )
                ";
            }else {
                $veiculo = " SELECT vei_marca, vei_modelo, vei_ano , vei_preco, vei_quilometragem, vei_historico
                FROM veiculo ";
            }
            $resultado = mysqli_query($con,$veiculo);
            if (mysqli_num_rows($resultado) == 0) {
                echo "Nenhum veículo encontrado com os dados informados.";
            } else {
                while ($informacao = mysqli_fetch_assoc($resultado)) {
                    echo "marca: " . $informacao["vei_marca"] . "<br>";
                    echo "ano: " . $informacao["vei_modelo"] . "<br>";
                    echo "ano: " . $informacao["vei_ano"] . "<br>";
                    echo "preço: " . $informacao["vei_preco"] . "<br>";
                    echo "quilometragem: " . $informacao["vei_quilometragem"] . "<br>";
                    echo "historico: " . $informacao["vei_historico"] . "<br><br>";
                }
            }
            mysqli_close($con); 
        }
    ?>
</body>
</html>