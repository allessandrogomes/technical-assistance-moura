<?php

    include_once('config.php');

    $sql = "SELECT * FROM diagnosticos ORDER by id DESC";

    $result = $conexao->query($sql);

    print_r($result);

?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <table>
            <tbody>
            <?php
                while($user_data = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$user_data['id']."</td>";
                    echo "<td>".$user_data['data_entrada']."</td>";
                    echo "<td>".$user_data['modelo']."</td>";
                    echo "<td>".$user_data['codigo']."</td>";
                    echo "<td>".$user_data['diagnostico']."</td>";
                    echo "<td>".$user_data['data_saida']."</td>";
                }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>