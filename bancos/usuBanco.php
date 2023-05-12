<?php

    require_once('../conexao.php');
    //
    $delet = "DROP TABLE usuario";
    $deletou = mysqli_query($con, $delet);
    if($deletou){
        echo "tabela excluida com susceso";
    }else{
        echo "erro ao excluir tabela: ". mysqli_error($con);
    }
    //
    $tabela ="CREATE TABLE 
    usuario(
    usu_id INT AUTO_INCREMENT PRIMARY KEY,
    usu_usuario VARCHAR(20),
    usu_senha VARCHAR(20),
    usu_nome VARCHAR(80), 
    usu_celular VARCHAR(20), 
    usu_cpf VARCHAR(20), 
    usu_idade VARCHAR(5)
    )";
    $resultado = mysqli_query($con, $tabela);

    if ($resultado) {
        echo "Tabela criada com sucesso!!";
    } else {
        echo "Erro: " . mysqli_error($con);
    }

    mysqli_close($con);
?>