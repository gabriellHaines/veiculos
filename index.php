<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <div>
        <label for="login">Login</label>
        <form method="post">
            <label for = "usuario">Digite seu Usuário:</label><br>
            <input type = "text" id = "usuario" name = "usuario"  maxlength = "20"><br>
            <label for = "senha">Digite sua Senha:</label><br>
            <input type = "password" id = "senha" name = "senha"  maxlength = "20"><br>
            <button type = "submit" name = "Enviar">Enviar</button>
            <button type = "submit" name = "cadastrar">Cadastrar</button><br>    
        </form>
    </div>
    <?php
        
        if (isset($_POST["cadastrar"])) {
            header('location:./cadastrar.php');
        }
        
        if (isset($_POST["Enviar"])) {
            
            $usuario = $_POST["usuario"];
            
            require_once('./conexao.php');
            
            //
            $usu =  "SELECT usu_usuario, usu_senha , usu_id, usu_nome
            FROM usuario
            WHERE ( usu_usuario = '$usuario'  )
            ";
            $resultado = mysqli_query($con , $usu);
            
            //
            if (mysqli_num_rows($resultado) == 0){
                echo "Usuário inexistente";
            }else{
                
                //
                $row = mysqli_fetch_assoc($resultado);
                
                $usu_senha = $row["usu_senha"];
                
                $senha = $_POST["senha"];
                
                if ($senha == $usu_senha) {
                    
                    $usu_id = $row["usu_id"];
                    $usu_usuario = $row['usu_usuario'];
                    $usu_nome = $row["usu_nome"];
                    
                    session_start();
                    $_SESSION['usu_usuario'] = $usu_usuario;
                    $_SESSION['usu_nome'] = $usu_nome;
                    $_SESSION['usu_id'] = $usu_id;
                    
                    header('location:./logado/index.php');
                
                } else {
                    echo "Senha incorreta";
                }
            }
            mysqli_close($con);
        }
    ?>
</body>
</html>