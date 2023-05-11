<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro usuário</title>
</head>
<body>
    <form action="" method = "post">
        <label for="usuario">Digite um Usuário: </label><br>
        <input type = "text" name = "usuario"  ><br>
        <label for="senha">Digite uma Senha: </label><br>
        <input type = "password" name = "senha"  ><br>
        <label for="senha">Repita a Senha: </label><br>
        <input type = "password" name = "senhaR"  ><br>
        <label for="nome">Digite seu Nome Completo: </label><br>
        <input type="text" name = "nome"  ><br>
        <label for="celular">Digite seu Telefone: </label><br>
        <input type="text" name = "celular" ><br>
        <label for="cpf">Digite seu CPF: </label><br>
        <input type="text" name = "cpf"  ><br>
        <label for="idade">Digite sua Idade: </label><br>
        <input type="text" name = "idade"  ><br>
        <button  type="submit" name = "enviar">Enviar</button><br>
        <button type = "submit" name = "login">Ir Para Login</button><br>
    </form>
    <?php 
        
        if(isset($_POST["login"])){
            header('location:./index.php');
        }
        
        if (isset($_POST["enviar"])) {
            
            $usuario = $_POST["usuario"];
            $senhaR = $_POST["senhaR"];
            $senha = $_POST["senha"];
            
            if($senhaR == $senha){
                require_once('./conexao.php');
                $verificaUsuario =  "SELECT usu_usuario
                FROM usuario
                WHERE ( usu_usuario = '$usuario'  )
                ";
                $resultado = mysqli_query($con , $verificaUsuario);
                if(mysqli_num_rows($resultado) == 0){    
                    $nome = $_POST["nome"];
                    $celular = $_POST["celular"];
                    $cpf = $_POST["cpf"];
                    $idade= $_POST["idade"];
                    $insertTabela = "INSERT INTO usuario 
                    (usu_usuario,
                    usu_senha,
                    usu_nome,
                    usu_celular,
                    usu_cpf,
                    usu_idade)
                    VALUES 
                    ('$usuario',
                    '$senha', 
                    '$nome', 
                    '$celular',
                    '$cpf',
                    '$idade')
                    ";
                    mysqli_query($con,$insertTabela);  
                    if (mysqli_error($con)) {
                        echo "Erro ao executar a query: ". mysqli_error($con);
                    }else{
                        session_start();
                        $_SESSION['usu_id'] = $usuario;
                        header('location:./logado/index.php');
                    }   
                }else {
                    echo "O usuário $usuario já esta cadastrado tente outro nome  de usuário";
                }
            }else{
                echo "Senhas Diferentes, insira senha iguais" ;
            } 
            mysqli_close($con);
        }
    ?>
</body>
</html>