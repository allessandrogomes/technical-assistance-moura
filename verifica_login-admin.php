<?php
    session_start();
    if(!$_SESSION['cnpj']) {
        header('Location: index.php');
        exit();
    } else if($_SESSION['perfil'] == '1') {
        header('Location: index.php');
        exit();
    }
?>