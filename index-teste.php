<?php
    session_start();

    include_once('config.php');

    $sqll = "SELECT * FROM diagnosticos ORDER by id DESC";
    $resultt = $conexao->query($sqll);
    $user_dataa = mysqli_fetch_assoc($resultt);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="shortcut icon" href="./img/icon-moura.png" />
        <link rel="stylesheet" href="./css/normalize.css">
        <link rel="stylesheet" href="./css/reset.css">
        <link rel="stylesheet" href="./css/style.css">
        <title>Assistência Técnica - Bonfim Baterias</title>
    </head>
    <body>
        <div class="main-mobile">
            <div class="container__chamada__main-mobile">
                <div class="chamada__texto">
                    <h1 class="texto__titulo">É revendedor?</h1>
                    <h1 class="texto__titulo2">Solicite seu cadastro, e verifique as assistências em andamento.</h1>
                    <div class="container__botao-card">
                        <a href="./solicitar-cadastro.php"><h3 class="botao-card">Solicite agora</h1></a>
                    </div>
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
                                    <button class="botao__assistencias"><a href="./painel.php">Assistências</a></button>
                                    <button class="botao-sair"><a href="./logout.php">Sair</a></button>
                                    <?php
                                    endif;
                                    ?>

                                    <?php
                                        if($_SESSION and $_SESSION['perfil'] == '2'):
                                    ?>
                                    <h2 style="font-size: 14px; font-family: helvetica, arial, sans-serif; font-weight: 600;">PAINEL DE CONTROLE</h2>
                                    <button class="botao__assistencias"><a href="./painel-admin.php">Painel</a></button>
                                    <button class="botao-sair"><a href="./logout.php">Sair</a></button>
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
                </div>
            </div>
        </header>
        <div class="main">
            <div class="container__chamada__main">
                <div class="chamada__texto">
                    <h1 class="texto__titulo">É revendedor?</h1>
                    <h1 class="texto__titulo2">Solicite seu cadastro, e verifique as assistências em andamento.</h1>
                    <div class="container__botao-card">
                        <a href="./solicitar-cadastro.php"><h3 class="botao-card">Solicite agora</h1></a>
                    </div>
                </div>
                <div class="container__chamada__imagem"><img class="chamada__imagem" src="./img/bateria.png" alt="Banner Bateria Moura"></div>
            </div>
        </div>
        <section class="opcoes">
            <div class="treinamentos">
                <div class="container-card__lista">
                    <div class="container__imagem--opcoes">
                        <a class="container-img-card__lista" href="./treinamentos.php">
                            <img src="./img/Treinamento2.png" class="img-card__lista">
                        </a>
                    </div>
                    <div class="container-texto__lista">
                        <div class="container__tituloedescricao-card">
                            <a href="./treinamentos.php"><h1 class="titulo-card">Treinamentos</h1></a>
                            <a href="./treinamentos.php"><h2 class="descricao-card">Dicas do Conexão Revenda</h2></a>
                        </div>
                        <div class="tituloedescricao-card__descricao2">
                            <a href="./treinamentos.php"><h2 class="descricao2">Realize treinamentos para aperfeiçoar e aprender novas técnicas que serão de extrema importância para profissionalizar ainda mais o seu negócio. Apartir disso, conseguirá realizar testes mais precisos e acelerar os processos de assistência ao cliente.</h2></a>
                        </div>
                        <div class="container__botao-card">
                            <a href="./treinamentos.php"><h3 class="botao-card">Faça agora</h1></a>
                        </div>
                        <div class="container__aplicacoes-card">
                            <h3 class="aplicacoes-card">Conteúdos</h3>
                            <h4 class="modelos-de-carros__card">Fuga de corrente • Teste de partida • Vazamento • Geração • Sobrecarga • Polo invertido e mais</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="barra-mobile"></div>
            <div class="container__opcoes--produtos">
                <div class="container__produtos--texto">
                    <a target="_blank" href="https://www.moura.com.br/produtos/"><h1 class="titulo-card">Produtos</h1></a>
                    <a target="_blank" href="https://www.moura.com.br/produtos/"><h2 class="descricao-card">Conheça nossa linha de baterias</h2></a>
                    <div class="container__botao-card">
                        <a href="https://www.moura.com.br/produtos/" target="_blank"><h3 class="botao-card">Veja agora</h1></a>
                    </div>
                    <h2 class="aplicacoes-card">Tipos</h2>
                    <h4 class="modelos-de-carros__card">Carros • Motos • Veículos Pesados • Estacionárias</h4>
                </div>
                <div class="container__produtos--imagem">
                    <a  target="_blank" href="https://www.moura.com.br/produtos/">
                        <img src="./img/bateriamoura2.png" alt="" class="produtos--imagem">
                    </a>
                </div>
            </div>
            <div class="barra-mobile"></div>
            <div class="container__opcoes--descubra">
                <div class="container__descubra--imagem">
                    <a target="_blank" href="https://www.moura.com.br/descubra-qual-a-sua-bateria/">
                        <img src="./img/veiculos2.png" alt="" class="descubra__imagem">
                    </a>
                </div>
                <div class="container__descubra--texto">
                    <a target="_blank" href="https://www.moura.com.br/descubra-qual-a-sua-bateria/">
                        <h1 class="titulo-card">Descubra sua bateria</h1>
                    </a>
                    <a target="_blank" href="https://www.moura.com.br/descubra-qual-a-sua-bateria/">
                        <h2 class="descricao-card card-descobrir">Encontre a bateria correta para o seu veículo</h2>
                    </a>
                    <div class="container__botao-card">
                        <a href="https://www.moura.com.br/descubra-qual-a-sua-bateria/" target="_blank"><h3 class="botao-card">Descubra agora</h1></a>
                    </div>
                    <h2 class="aplicacoes-card">Veículos</h2>
                    <h4 class="modelos-de-carros__card">Carros • Motos • Veículos Pesados</h4>
                </div>
            </div>
            <div class="barra-mobile"></div>
            <div class="container__opcoes--revendas">
                <div class="container__revendas--texto">
                    <a target="_blank" href="https://www.moura.com.br/revendas/">
                        <h1 class="titulo-card">Revendas</h1>
                    </a>
                    <a target="_blank" href="https://www.moura.com.br/revendas/">
                        <h2 class="descricao-card card-revendas">Encontre um de nossos revendedores mais próximo de você</h2>
                    </a>
                    <div class="container__botao-card">
                        <a href="https://www.moura.com.br/revendas/" target="_blank"><h3 class="botao-card">Encontre agora</h1></a>
                    </div>
                </div>
                <div class="container__revendas--imagem">
                    <a target="_blank" href="https://www.moura.com.br/revendas/">
                        <img src="./img/mapa bahia.png" alt="" class="revendas__imagem">
                    </a>
                </div>
            </div>
        </section>
        <section class="localizacao">
            <h1 class="localizacao__titulo">Nossa localização</h1>
            <div class="mapa">
                <iframe class="mapa2" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3935.8214605921553!2d-40.50251764315717!3d-9.437051855214353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7737191c13a68e5%3A0x722f8f55890e96dd!2sBaterias%20Moura%20-%20Distribuidor%20Bonfim!5e0!3m2!1spt-BR!2sbr!4v1653605510389!5m2!1spt-BR!2sbr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
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
    </body>
</html>