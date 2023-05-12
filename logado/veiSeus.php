<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Veículos do Usuário</title>
        
    </head>
    <body>

        <form method="post">
            <button name = 'voltar'>Voltar</button>
        </form>

        <table >
        <tr>
            <th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Preço</th>
            <th>Quilometragem</th>
            <th>Histórico</th>
            <th>Alterar Dados</th>
            <th>Excluir Veículo</th>
        </tr>
        <?php

            if (isset($_POST['voltar'])) {
                header('location:./index.php');
            }

            session_start();
            $usu_id = $_SESSION['usu_id']; 
            
            require_once('../conexao.php');

            $veiculoUsuario = "SELECT usu_id,vei_id , vei_placa , vei_marca , vei_modelo , vei_ano , vei_preco , vei_quilometragem , vei_historico
            FROM veiculo
            WHERE ( usu_id = '$usu_id')
            ";
            $resultado = mysqli_query($con,$veiculoUsuario);
            if (mysqli_num_rows($resultado) == 0) {
                echo "Nenhum veículo do usuário encontrado.";
            } else {
                while ($informacao = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $informacao["vei_placa"] . "</td>";
                    echo "<td>" . $informacao["vei_marca"] . "</td>";
                    echo "<td>" . $informacao["vei_modelo"] . "</td>";
                    echo "<td>" . $informacao["vei_ano"] . "</td>";
                    echo "<td>" . $informacao["vei_preco"] . "</td>";
                    echo "<td>" . $informacao["vei_quilometragem"] . "</td>";
                    echo "<td>" . $informacao["vei_historico"] . "</td>";
                    echo "<td><a href = './veiAlt.php'><button>Alterar</button></a></td>";
                    echo "<td><form method = 'post'><button type = 'submit' name = 'excluir'>Excluir</button></form></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($con);     
        ?>
        </table>
    </body>
</html>