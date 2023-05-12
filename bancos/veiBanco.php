<?php

    require_once('../conexao.php');
    //
    $delet = "DROP TABLE veiculo";
    $deletou = mysqli_query($con, $delet);
    if($deletou){
        echo "tabela excluida com susceso";
    }else{
        echo "erro ao excluir tabela: ". mysqli_error($con);
    }
    //
    $tabela = "CREATE TABLE 
    veiculo(
    vei_id INT AUTO_INCREMENT PRIMARY KEY ,
    usu_id INT,
    vei_placa VARCHAR(10), 
    vei_marca VARCHAR(20), 
    vei_modelo VARCHAR(50), 
    vei_ano VARCHAR(10), 
    vei_preco VARCHAR(15), 
    vei_quilometragem VARCHAR(10), 
    vei_historico VARCHAR(200)
    )";

    if (mysqli_query($con,$tabela)) {
        echo "Tabela criada com sucesso!!";
    }else {
        echo "Erro: " . mysqli_error($con);
    }

    mysqli_close($con);
?>