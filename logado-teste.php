<?php
    session_start();
    include('config.php');

    if(empty($_POST['cnpj']) || empty($_POST['senha'])) {
         header('Location: index-teste.php');
         exit();
    }

    $cnpj = mysqli_real_escape_string($conexao, $_POST['cnpj']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $perfil_admin = mysqli_real_escape_string($conexao, "SELECT perfil FROM usuario WHERE perfil = '2'");
    $razao_social = mysqli_real_escape_string($conexao, "SELECT razao_social FROM usuario WHERE usuario = {$_POST['cnpj']}");
 


    $query_admin = "SELECT id_usuario, usuario FROM usuario WHERE usuario ='{$cnpj}' and senha = '{$senha}' and perfil = '2'";
    $query = "SELECT id_usuario, usuario FROM usuario WHERE usuario = '{$cnpj}' and senha = '{$senha}'";

    $result_admin = mysqli_query($conexao, $query_admin);
    $result = mysqli_query($conexao, $query);

    $row_admin = mysqli_num_rows($result_admin);
    $row = mysqli_num_rows($result);

    $admin = false;
    
    

    if ($row_admin == 1) {
        $_SESSION['cnpj'] = $cnpj;
        $_SESSION['perfil'] = 2;
        if($_SERVER['HTTP_REFERER'] == 'https://bfbr999.000webhostapp.com/treinamentos.php' ) {
            header('Location: treinamentos.php');
        } else {
            header('Location: index-teste.php');
        }
    } else if ($row == 1) {
        $_SESSION['cnpj'] = $cnpj;
        $_SESSION['perfil'] = 1;
        if($_SERVER['HTTP_REFERER'] == 'https://bfbr999.000webhostapp.com/treinamentos.php' ) {
            header('Location: treinamentos.php');
        } else {
            header('Location: index-teste.php');
        }
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: index-teste.php');
        exit();
    }

?>
