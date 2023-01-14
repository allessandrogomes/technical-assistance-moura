<?php
    session_start();
    if(!$_SESSION['cnpj']) {
        header('Location: index.php');
        exit();
    }
?>