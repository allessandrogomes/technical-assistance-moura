<?php
    include('verifica_login.php');
?>

<?php
    session_start();
    include_once('config.php');

    $sql = "SELECT * FROM diagnosticos ORDER by id DESC";
    $sqll = "SELECT * FROM diagnosticos ORDER by id DESC";

    $result = $conexao->query($sql);
    $resultt = $conexao->query($sqll);

    $user_data = mysqli_fetch_assoc($result);
    $user_dataa = mysqli_fetch_assoc($resultt);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="shortcut icon" href="./img/icon-moura.png" />
    <link rel="stylesheet" href="./css/painel-cliente.css">
    <link rel="stylesheet" href="./css/painel-teste.css">
    
    <title>Dashboard</title>
</head>
<body>
<header class="principal__cabecalho">
        <nav>
            <a href="./index.php">
                <img class="logo-moura" src="./img/moura-logo.png" alt="Compre aqui sua bateria!">
            </a>
            <div class="mobile__menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav__cabecalho">
                <li class="itens-nav__cabecalho"><a class="link-itens-nav__cabecalho" href="./treinamentos.php">Treinamentos</a></li>
                <li class="itens-nav__cabecalho"><a target="_blank" class="link-itens-nav__cabecalho" href="https://www.moura.com.br/produtos/">Produtos</a></li>
                <li class="itens-nav__cabecalho"><a target="_blank" class="link-itens-nav__cabecalho" href="https://www.moura.com.br/descubra-qual-a-sua-bateria/">Sua bateria</a></li>
                <li class="itens-nav__cabecalho"><a target="_blank" class="link-itens-nav__cabecalho" href="https://www.moura.com.br/revendas/">Revendas</a></li>
                <li class="itens-nav__cabecalho"><a target="_blank" class="link-itens-nav__cabecalho" href="https://goo.gl/maps/wptqWDtTCvP4C6Hh8">Localização</a></li>
                <li class="itens-nav__cabecalho"><a target="_blank" href="https://api.whatsapp.com/send?phone=5574999658200"><img class="whatsapp__icon" src="./img/icon-whatsapp.png"></a></li>
                <li class="itens-nav__cabecalho login">
                    <form action="logado-teste.php" method="POST">
                        <?php
                        if(isset($_SESSION['nao_autenticado'])):
                        ?>
                        <p class="login-erro">CNPJ ou senha inválido</p>
                        <?php
                        endif;
                        unset($_SESSION['nao_autenticado']);
                        ?>

                        <?php
                            if($_SESSION and $_SESSION['perfil'] == '1'):
                        ?>
                        <h2 style="font-size: 14px; font-family: helvetica, arial, sans-serif; font-weight: 600;">
                        <?php 
                                while($user_dataa = mysqli_fetch_assoc($resultt)){
                                    echo "<tr>";
                                        if($_SESSION['cnpj'] == $user_dataa['cnpj']) {
                                            echo "<td>".$user_dataa['cliente']."</td>";
                                            break;
                                }
                            }
                        ?>
                        </h2>
                        <button class="botao__assistencias"><a href="./index.php">Início</a></button>
                        <?php
                        endif;
                        ?>

                        <?php
                            if($_SESSION and $_SESSION['perfil'] == '2'):
                        ?>
                        <h2 style="font-size: 14px; font-family: helvetica, arial, sans-serif; font-weight: 600;">PAINEL DE CONTROLE</h2>
                        <button class="botao__assistencias"><a href="./index.php">Início</a></button>
                        <?php
                        endif;
                        ?>

                        
                        <?php
                            if(!$_SESSION):
                        ?>
                            <input name="cnpj" id="login__cnpj" placeholder="CNPJ" type="text" maxlength="14" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                            <input name="senha" id="login__senha" placeholder="Senha" type="password" maxlength="7" required>
                            <input value="Entrar" class="login__botao-entrar" type="submit">
                            <a href="./solicitar-cadastro.php" class="login__solicitar-acesso">Solicitar acesso</a>
                        <?php
                        endif;   
                        ?>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="main">
            <div class="container__titulo-e-sair">
                <h1 class="titulo__razao-social">
                    <?php 
                        while($user_dataa = mysqli_fetch_assoc($resultt)){
                            echo "<tr>";
                            if($_SESSION['cnpj'] == $user_dataa['cnpj']) {
                                echo "<td>".$user_dataa['cliente']."</td>";
                                break;
                            }
                    }
                    ?></h1>
                <h2 class="botao-sair"><a href="./logout.php">Sair</a></h2>
            </div>
            <div class="container_tabela">
            <h3 class="tabela__instrucao">Arraste para as demais informações &#10145;&#65039</h3>
            <table class="tabela">
                <tbody class="tabela_corpo">
                    <?php
                        while($user_data = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                if($_SESSION['cnpj'] == $user_data['cnpj']) {
                                    echo '<div class="card">
        <div class="card__container___titulo">
            <p class="card__titulo">ASSISTÊNCIA</p>
        </div>
        <div class="card__container___conteudo">
            <div class="card__container___imagem">
                <div class="card__status"></div>
                <img class="card__imagem" src="./img/bateriamoura-teste.png" alt="Ilustração de uma bateria moura">
                <p class="card__imagem___descricao">'.$user_data['modelo'].'</p>
            </div>
            <div class="card__conteudo___barra"></div>
            <div class="card__container___informacoes">
                <p class="card__informacoes___dados">Entrada: '.$user_data['data_entrada'].'</p>
                <p class="card__informacoes___dados">Código bateria: '.$user_data['codigo'].'</p>
                <p class="card__informacoes___dados">Diagnóstico: '.$user_data['status'].'</p>
                <p class="card__informacoes___dados">Saída: '.$user_data['data_saida'].'</p>
            </div>
        </div>
    </div>';
                                    //echo "<td>".$user_data['data_coleta']."</td>";
                                    //echo "<td>".$user_data['data_entrada']."</td>";
                                    //echo "<td>".$user_data['modelo']."</td>";
                                    //echo "<td>".$user_data['codigo']."</td>";
                                    //echo "<td>".$user_data['status']."</td>";
                                    //echo "<td>".$user_data['data_saida']."</td>";
                                }
                        }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer class="rodape">
        <a target="_blank" href="https://www.moura.com.br/" class="rodape__moura--logo">
            <img class="moura-logo__rodape" src="./img/moura-logo.png" alt="">
        </a>
        <a target="_blank" href="https://api.whatsapp.com/send?phone=5574999658200" class="rodape__whatsapp">
            <img class="rodape__whatsapp___img" src="./img/icon-whatsapp2.png" alt="">
            <h3 class="rodape__whatsapp___texto">Whatsapp</h3>
        </a>
        <a href="#" class="rodape__phone">
            <img src="./img/phone.png" alt="">
            <h3 class="rodape__phone___texto">0800 701 2021</h3>
        </a>
        <h3 class="rodape__texto">Copyright &copy; 2022 - Alessandro da Silva Gomes - Todos os direitos reservados.</h3>
    </footer>
    <script src="./js/mobile-navbar.js"></script>
    <script src="./envio-dados.php"></script>
</body>
</html>