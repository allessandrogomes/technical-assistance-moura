<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="shortcut icon" href="./img/icon-moura.png" />
    <link rel="stylesheet" href="./css/style-solicitar-acesso.css">
    <title>Solicitar Acesso</title>
</head>
<body>
    <div class="main-mobile">
        <div class="container__chamada__main-mobile">
            <div class="chamada__texto">
                <h1 class="texto__titulo">Assistência Técnica Moura</h1>
                <h1 class="texto__titulo2">Bonfim Baterias</h1>
            </div>
            <div class="container__chamada__imagem"><img class="chamada__imagem" src="./img/bateria.png" alt="Banner Bateria Moura"></div>
        </div>
        <div class="seta-baixo"><img class="imagem__seta-baixo" src="./img/seta-baixo.png" alt="Seta indicadora para baixo"></div>
    </div>
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
                        <!-- <li class="itens-nav__cabecalho"><a class="link-itens-nav__cabecalho" href="#">FAQs</a></li> -->
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
                                <input name="cnpj" id="login__cnpj" placeholder="CNPJ" type="text" maxlength="14" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onpaste="return false" required>
                                <!-- <script src="./login.js"></script> -->
                                <input name="senha" id="login__senha" placeholder="Senha" type="password" maxlength="7" required>
                                <input value="Entrar" class="login__botao-entrar" type="submit">
                                <a href="./solicitar-cadastro.php" class="login__solicitar-acesso">Solicitar acesso</a>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main class="main">
        <section class="cadastro__principal">
            <h2 class="titulo-principal">Solicitar acesso de revendedor</h2>
            <form action="recebe.php" method="POST" class="formulario">
                <fieldset>
                    <legend class="legend">Preencha os dados</legend>
                    <div class="input-container">
                        <input type="text" name="razao-social" id="razao-social" class="input" data-tipo="razao-social" onpaste="return false" required>
                        <script src="./js/apenas-letras-razao.js"></script>
                        <label class="input-label" for="nome">Razão Social</label>
                        <script src="./js/razao-uppercase.js"></script>
                    </div>
                    <div class="input-container">
                        <input type="text" name="cnpj" id="cnpj" class="input" data-tipo="cnpj" maxlength="14" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onpaste="return false" pattern="(^\d{3}.?\d{3}.?\d{3}-?\d{2})|(^\d{2}.?\d{3}.?\d{3}/?\d{4}-?\d{2})" title="CNPJ Inválido" autocomplete="off" required>
                        <label class="input-label" for="cnpj">CNPJ (Apenas números)</label>
                        <script src="./validação-cnpj.js"></script>
                    </div>
                    <div class="input-container">
                        <input type="text" name="cidade" id="cidade" class="input" data-tipo="cidade" required>
                        <label class="input-label" for="cidade">Cidade</label>
                        <script src="./js/apenas-letras-cidade.js"></script>
                    </div>
                    <div class="input-container">
                        <input type="tel" name="telefone" id="telefone" class="input" data-tipo="telefone" maxlength="14" minlength="14" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onpaste="return false" autocomplete="off" required>
                        <label class="input-label" for="telefone">Telefone</label>
                        <script src="./js/complete-telefone.js"></script>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" id="email" class="input" data-tipo="email" required>
                        <label class="input-label" for="email">Email</label>
                    </div>
                    <div class="submit-container">
                        <input class="submit" type="submit" name="submit" value="Enviar solicitação">
                    </div>
                    <h3 class="notificacao">Caso aprovado, a senha de acesso será enviada para o email</h3>
                </fieldset>
            </form>
        </section>
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
        <h3 class="rodape__texto">Copyright &copy; 2022 - Bonfim Baterias LTDA - Todos os direitos reservados.</h3>
        <h4 class="rodape__texto">Desenvolvimento por Alessandro Gomes e Vinícius Duarte</h4>
            <a target="_blank" href="https://github.com/allessandrogomes"><img class="icon-github" src="./img/icon-gitgub.png" alt=""></a>
    </footer>
    <script src="./js/mobile-navbar.js"></script>
    <script src="./envio-dados.php"></script>
</body>
</html>