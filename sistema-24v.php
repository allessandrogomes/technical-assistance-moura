<?php
    session_start();

    include_once('config.php');

    $sqll = "SELECT * FROM diagnosticos ORDER by id DESC";
    $resultt = $conexao->query($sqll);
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
    <link rel="stylesheet" href="./css/style-treinamentos.css">
    <title>AT Bonfim Baterias - Treinamentos</title>
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
                    <form action="logado.php" method="POST">
                        <?php
                        if(isset($_SESSION['nao_autenticado'])):
                        ?>
                        <p class="login-erro">CNPJ ou senha inválido</p>
                        <?php
                        endif;
                        unset($_SESSION['nao_autenticado']);
                        ?>

                        <?php
                            if($_SESSION):
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
                        <button class="botao__assistencias"><a href="./painel.php">Assistências</a></button>
                        <button class="botao-sair"><a href="./logout.php">Sair</a></button>
                        <?php
                        endif;
                        ?>

                        
                        <?php
                            if(!$_SESSION):
                        ?>
                            <input name="cnpj" id="login__cnpj" placeholder="CNPJ" type="text" maxlength="14" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onpaste="return false" required>
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
    </div>
</div>
</header>
    <main style="background: white;">
        <section class="container-principal__teste">
            <div class="titulo-principal__texto--icone">
                <img class="icone-at__titulo" src="./img/icone-at.svg" alt="">
                <h1 class="titulo-principal__pastas">Sistema 24V</h1>
            </div>
            <div class="container__teste__texto-video">
                <a class="pdf_download" download href="./pdf/Sistema 24 V.pdf">Baixar PDF</a>
                <embed class="treinamentos__pdf" src="./pdf/Sistema 24 V.pdf#view=FitH" width="100%" type="application/pdf";>
            </div>
        </section>
    </main>
    <footer class="rodape">
        <a target="_blank" href="https://www.moura.com.br/" class="rodape__moura--logo"></a>
        <a target="_blank" href="https://api.whatsapp.com/send?phone=5574999658200" class="rodape__whatsapp">
            <img class="rodape__whatsapp___img" src="./img/icon-whatsapp2.png" alt="">
            <h3 class="rodape__whatsapp___texto">Whatsapp</h3>
        </a>
        <a href="#" class="rodape__phone">
            <img src="./img/phone.png" alt="">
            <h3 class="rodape__phone___texto">0800 701 2021</h3>
        </a>
        <h3 class="rodape__texto">Copyright &copy; 2022 - Bonfim Baterias LTDA - Todos os direitos reservados.</h3>
        <h4 class="rodape__texto">Desenvolvimento por Alessandro Gomes e Vinícius Duarte</h4>
        <a target="_blank" href="https://github.com/allessandrogomes"><img class="icon-github" src="./img/icon-gitgub.png" alt=""></a>
    </footer>
    <script src="./js/mobile-navbar.js"></script>
</body>
</html>