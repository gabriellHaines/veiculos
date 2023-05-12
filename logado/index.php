<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Logado</title>
    </head>
    <body>
        
        <div>
            <form method="post">
                <button name = 'trocaUsuario'>Trocar de Usuário</button>
                <button name = 'cadastrarVeiculo'>Cadastrar Veículo</button>
                <button>Alterar Veículo</button>
                <button name = 'buscaVeiclo'>Buscar Veículo</button>
                <button>Inativar Usuário</button>
                <button name = 'veiSeus'>Seus Veículos</button>
            </form>
        </div>


        <?php

            session_start();
            $nome = $_SESSION['usu_nome'];
            $usuario = $_SESSION['usu_usuario'];
            $id = $_SESSION['usu_id'];
            echo "nome: " . $nome . ' usuário: ' . $usuario . ' id: '. $id;
            
            if (isset($_POST['veiSeus'])) {
                header('location:./veiSeus.php');
            }
            if (isset($_POST['trocaUsuario'])) {
                //
                session_start();
                session_unset();
                session_destroy();
                header('location:../index.php');
            }

            if (isset($_POST['buscaVeiclo'])) {
                header('location:./veiBusca.php');
            }
            
            if (isset($_POST['cadastrarVeiculo'])) {
                header('location:./cadVeiculo.php');
            }
        ?>
    </body>
</html>
